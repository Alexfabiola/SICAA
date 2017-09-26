<?php

namespace AdminBundle\Entity;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * Photo
 * 
 */
class Photo
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string 
     */
    private $name;

    /**
     * @var UploadedFile
     */
    private $file;

    private $temp;
    function __construct($name = null){
        $this->name = "nameTemp";//$name;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return Photo
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Photo
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        // check if we have an old pdf path
        if (isset($this->path)) {
            // store the old name to delete after the update
            $this->temp = $this->path;
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }

    /**
     * Get file
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }
    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }
    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }
    protected function getUploadRootDir()
    {
        // la ruta absoluta del directorio donde se deben
        // guardar los archivos cargados
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
    protected function getUploadDir()
    {
        // se deshace del __DIR__ para no meter la pata
        // al mostrar el documento/pdf cargada en la vista.
        return 'uploads/profilephotos';
    }

    /**
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
            $this->path = $this->getFile()->guessExtension();
        }
    }
    /**
     */
    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }
        // check if we have an old pdf
        if (isset($this->temp)) {
            
            if(file_exists($this->getUploadRootDir().'/'.$this->id.".".$this->temp)){
                // delete the old pdf
                unlink($this->getUploadRootDir().'/'.$this->id.".".$this->temp);
            }
            // clear the temp pdf path
            $this->temp = null;
        }
        // si hay un error al mover el archivo, move() automáticamente
        // envía una excepción. This will properly prevent
        // the entity from being persisted to the database on error
        $this->getFile()->move(
            $this->getUploadRootDir(),
            $this->id.'.'.$this->getFile()->guessExtension()
        );
        /* Actualizamos al nuevo Path
         * para que se guarde en la base de datos el nombre asignado al archivo*/
        $this->setPath($this->id.'.'.$this->path);
        printf("<pre>");
        print_r($this->getPath());
        printf("</pre>");
        printf("<pre>");
        print_r($this->getId());
        printf("</pre>");
        
        
        // limpia la propiedad «file» ya que no la necesitas más
        $this->file = null;
    }
    /**
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

    public function __toString() {
        return sprintf('%d.png', $this->id);
    }
}
