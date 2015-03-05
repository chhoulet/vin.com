<?php

namespace Vin\FrontOfficeBundle\Entity;

use Doctrine\ORM\EntityRepository;

use Vin\FrontOfficeBundle\Entity\Appellation;

use Vin\FrontOfficeBundle\Entity\Vin;

/**
 * AppellationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AppellationRepository extends EntityRepository
{
	public function getAppellationByRegion()
	{
		$query = $this -> getEntityManager() -> createQuery('
			SELECT a
			FROM VinFrontOfficeBundle:Appellation a
			GROUP BY a.region');

		return $query -> getResult();
	}
}
