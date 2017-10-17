<?php

namespace Modules\Hr\Repositories\Cache;

use Modules\Hr\Repositories\ApplicationRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheApplicationDecorator extends BaseCacheDecorator implements ApplicationRepository
{
    public function __construct(ApplicationRepository $application)
    {
        parent::__construct();
        $this->entityName = 'hr.applications';
        $this->repository = $application;
    }
}
