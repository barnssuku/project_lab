<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjectRepository")
 */
class Project
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="project_topic", type="string", unique=true)
     */
    private $projectTopic;

    /**
     * @var array
     *
     * @ORM\Column(name="keywords", type="array", nullable=true)
     */
    private $keywords;

    /**
     * @var string
     *
     * @ORM\Column(name="except", type="text", unique=false)
     */
    private $except;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_written", type="date")
     */
    private $dateWritten;

    /**
     * @var array
     *
     * @ORM\Column(name="content", type="array")
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="department", type="string", length=220)
     */
    private $department;


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
     * Set projectTopic
     *
     * @param string $projectTopic
     *
     * @return Project
     */
    public function setProjectTopic($projectTopic)
    {
        $this->projectTopic = $projectTopic;

        return $this;
    }

    /**
     * Get projectTopic
     *
     * @return string
     */
    public function getProjectTopic()
    {
        return $this->projectTopic;
    }

    /**
     * Set keywords
     *
     * @param array $keywords
     *
     * @return Project
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get keywords
     *
     * @return array
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set except
     *
     * @param string $except
     *
     * @return Project
     */
    public function setExcept($except)
    {
        $this->except = $except;

        return $this;
    }

    /**
     * Get except
     *
     * @return string
     */
    public function getExcept()
    {
        return $this->except;
    }

    /**
     * Set dateWritten
     *
     * @param \DateTime $dateWritten
     *
     * @return Project
     */
    public function setDateWritten($dateWritten)
    {
        $this->dateWritten = $dateWritten;

        return $this;
    }

    /**
     * Get dateWritten
     *
     * @return \DateTime
     */
    public function getDateWritten()
    {
        return $this->dateWritten;
    }

    /**
     * Set content
     *
     * @param array $content
     *
     * @return Project
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return array
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set department
     *
     * @param string $department
     *
     * @return Project
     */
    public function setDepartment($department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return string
     */
    public function getDepartment()
    {
        return $this->department;
    }
}

