<?php
namespace PlaygroundReward\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\PrePersist;
use Doctrine\ORM\Mapping\PreUpdate;

/**
 * @ORM\Entity @HasLifecycleCallbacks
 * @ORM\Table(name="reward_achievement")
 */
class Achievement
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer");
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="PlaygroundUser\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     **/
    protected $user;
    
    /**
     * @ORM\ManyToOne(targetEntity="Reward")
     **/
    protected $reward;

    /**
     * Le type d'achievement
     * @ORM\Column(type="text", nullable=true)
     */
    protected $type;

    /**
     * La catégorie d'achievement
     * @ORM\Column(type="text", nullable=true)
     */
    protected $category;

    /**
     * Le libellé associé à l'event
     * @ORM\Column(type="text", nullable=true)
     */
    protected $label;

    /**
     * Le niveau
     * @ORM\Column(type="string", nullable=true)
     */
    protected $level;

    /**
     * Le label du niveau
     * @ORM\Column(name="level_label", type="string", nullable=true)
     */
    protected $levelLabel;

    /**
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    protected $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    protected $updatedAt;

    /** @PrePersist */
    public function createChrono()
    {
        $this->createdAt = new \DateTime("now");
        $this->updatedAt = new \DateTime("now");
    }

    /** @PreUpdate */
    public function updateChrono()
    {
        $this->updatedAt = new \DateTime("now");
    }

    /**
     * @param $id
     * @return Block|mixed
     */
    public function setId($id)
    {
        $this->id = (int) $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return the $user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param field_type $user
     */
    public function setUser($user)
    {
        $this->user = $user;
        
        return $this;
    }

    /**
     * @return the $reward
     */
    public function getReward()
    {
        return $this->reward;
    }

	/**
     * @param field_type $reward
     */
    public function setReward($reward)
    {
        $this->reward = $reward;
        
        return $this;
    }

	/**
     * @return the $category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param field_type $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
        
        return $this;
    }

    /**
     * @return the $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param field_type $type
     */
    public function setType($type)
    {
        $this->type = $type;
        
        return $this;
    }

    /**
     * @return the $label
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param field_type $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
        
        return $this;
    }

    /**
     * @return the $level
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param field_type $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
        
        return $this;
    }


    /**
     * @return the $levelLabel
     */
    public function getLevelLabel()
    {
        return $this->levelLabel;
    }

    /**
     * @param field_type $levelLabel
     */
    public function setLevelLabel($levelLabel)
    {
        $this->levelLabel = $levelLabel;
        
        return $this;
    }

    /**
     *
     * @return the $createdAt
     */
    public function getCreatedAt ()
    {
        return $this->createdAt;
    }

    /**
     *
     * @param \DateTime $createdAt
     */
    public function setCreatedAt ($createdAt)
    {
        $this->createdAt = $createdAt;
        
        return $this;
    }

    /**
     *
     * @return the $updatedAt
     */
    public function getUpdatedAt ()
    {
        return $this->updatedAt;
    }

    /**
     *
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt ($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        
        return $this;
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    /**
     * Populate from an array.
     *
     * @param array $data
     */
    public function populate($data = array())
    {
        /*$this->id = $data['id'];
        $this->username = $data['username'];
        $this->email = $data['email'];
        $this->displayName = $data['displayName'];
        $this->password = $data['password'];
        $this->state = $data['state'];*/
    }
}
