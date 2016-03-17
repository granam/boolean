<?php
namespace Granam\Tests\Boolean;

use Granam\Tests\Exceptions\Tools\AbstractExceptionsHierarchyTest;

class ExceptionsHierarchyTest extends AbstractExceptionsHierarchyTest
{
    protected function getTestedNamespace()
    {
        return $this->getRootNamespace();
    }

    protected function getRootNamespace()
    {
        return str_replace('\Tests', '', __NAMESPACE__);
    }

    protected function getExternalRootNamespace()
    {
        $scalarReflection = new \ReflectionClass('\Granam\Scalar\Scalar');

        return $scalarReflection->getNamespaceName();
    }

}