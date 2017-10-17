<?php

namespace Modules\Hr\Repositories\Cache;

use Modules\Hr\Repositories\PositionRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePositionDecorator extends BaseCacheDecorator implements PositionRepository
{
    public function __construct(PositionRepository $position)
    {
        parent::__construct();
        $this->entityName = 'hr.positions';
        $this->repository = $position;
    }
}
