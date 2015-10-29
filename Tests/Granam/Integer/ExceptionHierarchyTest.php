<?php
namespace Granam\Boolean;

use Granam\Exceptions\Tests\Tools\AbstractTestOfExceptionsHierarchy;

class ExceptionHierarchyTest extends AbstractTestOfExceptionsHierarchy
{
    protected function getTestedNamespace()
    {
        return __NAMESPACE__;
    }

    protected function getRootNamespace()
    {
        return $this->getTestedNamespace();
    }

    protected function getExternalRootNamespace()
    {
        $scalarReflection = new \ReflectionClass('\Granam\Scalar\Scalar');

        return $scalarReflection->getNamespaceName();
    }

}
