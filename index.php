<?php

namespace AppEntity;

use ApiPlatformCoreAnnotationApiResource;
use DoctrineORMMapping as ORM;

/**
 * Greet someone!
 *
 * @ApiResource
 * @ORMEntity
 */
class Greeting
{
    /**
     * @ORMId
     * @ORMColumn(type="guid")
     */
    public $id;

    /**
     * @var string Your nice message
     *
     * @ORMColumn
     */
    public $hello;
}
?>