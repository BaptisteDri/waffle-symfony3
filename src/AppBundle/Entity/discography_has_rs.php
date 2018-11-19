<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * discography_has_rs
 *
 * @ORM\Table(name="discography_has_rs")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\discography_has_rsRepository")
 */
class discography_has_rs
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
     * @ORM\Column(name="link", type="string", length=255, unique=false)
     */
    private $link;



    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="discography")
     * @ORM\JoinColumn(name="discography_id", referencedColumnName="id")
     */
    private $discographyId;


    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="rs")
     * @ORM\JoinColumn(name="rs_id", referencedColumnName="id")
     */
    private $rsId;



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
     * Set link
     *
     * @param string $link
     *
     * @return discography_has_rs
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }


    /**
     * Set discographyId
     *
     * @param integer $discographyId
     *
     * @return discography_has_rs
     */
    public function setDiscographyId($discographyId)
    {
        $this->discographyId = $discographyId;

        return $this;
    }

    /**
     * Get discographyId
     *
     * @return int
     */
    public function getDiscographyId()
    {
        return $this->discographyId;
    }

    /**
     * Set rsId
     *
     * @param integer $rsId
     *
     * @return discography_has_rs
     */
    public function setRsId($rsId)
    {
        $this->rsId = $rsId;

        return $this;
    }

    /**
     * Get rsId
     *
     * @return int
     */
    public function getRsId()
    {
        return $this->rsId;
    }
}
