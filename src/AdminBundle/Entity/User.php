<?php

namespace AdminBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * User
 * @Vich\Uploadable
 */
class User extends BaseUser
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $displayName;
    
    /**
     * @var boolean
     */
    private $gender;

    /**
     * @var string
     */
    private $mobilePhone;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $stateOrProvince;

    /**
     * @var int
     */
    private $postalCode;

    /**
     * @var string
     */
    private $countryOrRegion;

    /**
     * @var datetime $created
     */
    private $created;

    /**
     * @var datetime $updated
     */
    private $updated;

    /*********************/
    /*** Profile Photo ***/
    /*********************/

    /**
     * @var File
     */
    private $profilePhotoFile;
    /**
     * @var string
     */
    private $profilePhotoName;

    /**
     * @var integer
     */
    private $profilePhotoSize;


    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->created = new \DateTime();
        $this->updated = new \DateTime();

    }

    /**
     */
    public function postCreated()
    {
        $this->created = new \DateTime();
        $this->updated = new \DateTime();
    }
    /**
     */
    public function postUpdated()
    {
        $this->updated = new \DateTime();
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
     * Set name
     *
     * @param string $name
     *
     * @return User
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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set displayName
     *
     * @param string $displayName
     *
     * @return User
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * Get displayName
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Set mobilePhone
     *
     * @param string $mobilePhone
     *
     * @return User
     */
    public function setMobilePhone($mobilePhone)
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    /**
     * Get mobilePhone
     *
     * @return string
     */
    public function getMobilePhone()
    {
        return $this->mobilePhone;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set stateOrProvince
     *
     * @param string $stateOrProvince
     *
     * @return User
     */
    public function setStateOrProvince($stateOrProvince)
    {
        $this->stateOrProvince = $stateOrProvince;

        return $this;
    }

    /**
     * Get stateOrProvince
     *
     * @return string
     */
    public function getStateOrProvince()
    {
        return $this->stateOrProvince;
    }

    /**
     * Set postalCode
     *
     * @param integer $postalCode
     *
     * @return User
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return int
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set countryOrRegion
     *
     * @param string $countryOrRegion
     *
     * @return User
     */
    public function setCountryOrRegion($countryOrRegion)
    {
        $this->countryOrRegion = $countryOrRegion;

        return $this;
    }

    /**
     * Get countryOrRegion
     *
     * @return string
     */
    public function getCountryOrRegion()
    {
        return $this->countryOrRegion;
    }

    public function __toString() {
        return $this->displayName;
    }

    /**
     * Set gender
     *
     * @param boolean $gender
     *
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return boolean
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return User
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return User
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /*********************/
    /*** Profile Photo ***/
    /*********************/

    /**
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $profilePhoto
     *
     * @return User
     */
    public function setProfilePhotoFile(File $profilePhotoFile = null)
    {
        $this->profilePhotoFile = $profilePhotoFile;

        return $this;
    }

    /**
     * @return File|null
     */
    public function getProfilePhotoFile()
    {
        return $this->profilePhotoFile;
    }

    /**
     * @param string $profilePhotoName
     *
     * @return User
     */
    public function setProfilePhotoName($profilePhotoName)
    {
        $this->profilePhotoName = $profilePhotoName;
        
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProfilePhotoName()
    {
        return $this->profilePhotoName;
    }
    
    /**
     * @param integer $profilePhotoSize
     *
     * @return User
     */
    public function setProfilePhotoSize($profilePhotoSize)
    {
        $this->profilePhotosize = $profilePhotoSize;
        
        return $this;
    }

    /**
     * @return integer|null
     */
    public function getProfilePhotoSize()
    {
        return $this->profilePhotoSize;
    }
   

    /* *
     * @return File|null
     *
    public function getProfilePhotoFile()
    {
        return $this->profilePhotoFile;
    }

    **
     * @param EmbeddedFile $profilePhoto
     *
    public function setProfilePhoto(EmbeddedFile $profilePhoto)
    {
        $this->profilePhoto = $profilePhoto;
    }

    **
     * @return EmbeddedFile
     *
    public function getProfilePhoto()
    {
        return $this->profilePhoto;
    }*/
}


