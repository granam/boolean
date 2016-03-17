<?php
namespace Granam\Tests\Boolean\Tools;

use Granam\Tests\Exceptions\Tools\AbstractExceptionsHierarchyTest;

class ExceptionsHierarchyTest extends AbstractExceptionsHierarchyTest
{
    protected function getTestedNamespace()
    {
        return str_replace('\Tests', '', __NAMESPACE__);
    }

    protected function getRootNamespace()
    {
        $rootReflection = new \ReflectionClass('\Granam\Boolean\Boolean');

        return $rootReflection->getNamespaceName();
    }

    protected function getExternalRootNamespace()
    {
        $scalarReflection = new \ReflectionClass('\Granam\Scalar\Scalar');

        return $scalarReflection->getNamespaceName();
    }

}