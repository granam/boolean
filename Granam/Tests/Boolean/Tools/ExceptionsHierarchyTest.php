<?php
namespace Granam\Tests\Boolean\Tools;

use Granam\Boolean\Boolean;
use Granam\Tests\Exceptions\Tools\AbstractExceptionsHierarchyTest;

class ExceptionsHierarchyTest extends AbstractExceptionsHierarchyTest
{
    protected function getTestedNamespace()
    {
        return str_replace('\Tests', '', __NAMESPACE__);
    }

    protected function getRootNamespace()
    {
        $rootReflection = new \ReflectionClass(Boolean::class);

        return $rootReflection->getNamespaceName();
    }

    protected function getExternalRootNamespace()
    {
        $scalarReflection = new \ReflectionClass('\Granam\Scalar\Scalar');

        return $scalarReflection->getNamespaceName();
    }

}