<?php

namespace Vin\FrontOfficeBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * VinRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VinRepository extends EntityRepository
{
	public function vinDuMois()
	{
		$query = $this ->getEntityManager()->createQuery('
			SELECT v
			FROM VinFrontOfficeBundle:Vin v 
			WHERE v.price < 20
			')
		->setMaxResults(1);

		return $query -> getSingleResult();
	}

	public function bordeaux()
	{
		$query = $this -> getEntityManager()->createQuery('
			SELECT v 
			FROM VinFrontOfficeBundle:Vin v 
			JOIN v.region r
			WHERE r.nameRegion LIKE :region')
		->setParameter('region', '%ordeaux%')
		->setMaxResults(1);

		return $query -> getSingleResult();
	}

    public function getVinByPrice($price)
    {
        $query = $this ->getEntityManager()->createQuery('
            SELECT v
            FROM VinFrontOfficeBundle:Vin v
            WHERE v.price < :price')
        ->setParameter('price', $price);

        return $query -> getResult();
    }

    public function nbVins()
    {
        $query = $this -> getEntityManager()->createQuery('
            SELECT COUNT(v.id)
            FROM VinFrontOfficeBundle:Vin v
        ');

        return $query -> getSingleScalarResult();
    }

    public function vinLowPrice()
    {
        $query = $this -> getEntityManager()->createQuery('
            SELECT COUNT(v.id)
            FROM VinFrontOfficeBundle:Vin v
            WHERE v.price < 20');

        return $query -> getSingleScalarResult();
    }

    public function getVinLowPrice()
    {
        $query = $this->getEntityManager()->createQuery('
            SELECT v
            FROM VinFrontOfficeBundle:Vin v
            WHERE v.price <20');

        return $query->getResult();
    }

    public function getStockByRegion()
    {
        $query = $this -> getEntityManager()->createQuery('
           SELECT COUNT(v.id)
           FROM VinFrontOfficeBundle:Vin v
           JOIN v.region r
           WHERE r.nameRegion LIKE :region')
        ->setParameter('region', '%ordeaux%');

        return $query -> getSingleScalarResult();
    }



}

