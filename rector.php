<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    // get parameters
    $parameters = $containerConfigurator->parameters();

    // Define what rule sets will be applied
    $parameters->set(Option::SETS, [
        SetList::DEAD_CODE,
        SetList::CODE_QUALITY,
        SetList::CODING_STYLE,
    ]);

    // get services (needed for register a single rule)
    $services = $containerConfigurator->services();

    // SOLID
    $services->set(\Rector\EarlyReturn\Rector\If_\ChangeAndIfToEarlyReturnRector::class);
    $services->set(\Rector\EarlyReturn\Rector\If_\ChangeIfElseValueAssignToEarlyReturnRector::class);

    // 7.1
    $services->set(\Rector\Php71\Rector\ClassConst\PublicConstantVisibilityRector::class);

    // 7.2
    $services->set(\Rector\Php72\Rector\FuncCall\StringifyDefineRector::class);

    // 7.3
    $services->set(\Rector\Php73\Rector\FuncCall\JsonThrowOnErrorRector::class);
    $services->set(\Rector\Php73\Rector\FuncCall\StringifyStrNeedlesRector::class);
    // 7.4
    $services->set(\Rector\Php74\Rector\Property\RestoreDefaultNullToNullableTypePropertyRector::class);
    $services->set(\Rector\Php74\Rector\Property\TypedPropertyRector::class);
    $services->set(\Rector\Php74\Rector\Assign\NullCoalescingOperatorRector::class);
    $services->set(\Rector\Php74\Rector\FuncCall\MbStrrposEncodingArgumentPositionRector::class);
    $services->set(\Rector\Php74\Rector\FuncCall\GetCalledClassToStaticClassRector::class);
    $services->set(\Rector\Php74\Rector\Closure\ClosureToArrowFunctionRector::class);
    $services->set(\Rector\Php74\Rector\FuncCall\ArraySpreadInsteadOfArrayMergeRector::class);

    // 8.0
    $services->set(\Rector\Php80\Rector\Switch_\ChangeSwitchToMatchRector::class);
    $services->set(\Rector\Php80\Rector\FuncCall\ClassOnObjectRector::class);
    $services->set(\Rector\Php80\Rector\Class_\ClassPropertyAssignToConstructorPromotionRector::class);
    $services->set(\Rector\Php80\Rector\ClassMethod\FinalPrivateToPrivateVisibilityRector::class);
    $services->set(\Rector\Php80\Rector\Ternary\GetDebugTypeRector::class);
    $services->set(\Rector\Php80\Rector\If_\NullsafeOperatorRector::class);
    $services->set(\Rector\Php80\Rector\ClassMethod\OptionalParametersAfterRequiredRector::class);
    $services->set(\Rector\Php80\Rector\Catch_\RemoveUnusedVariableInCatchRector::class);
    $services->set(\Rector\Php80\Rector\ClassMethod\SetStateToStaticRector::class);
    $services->set(\Rector\Php80\Rector\NotIdentical\StrContainsRector::class);
    $services->set(\Rector\Php80\Rector\Identical\StrEndsWithRector::class);
    $services->set(\Rector\Php80\Rector\Identical\StrStartsWithRector::class);
    $services->set(\Rector\Php80\Rector\Class_\StringableForToStringRector::class);
    $services->set(\Rector\Php80\Rector\FunctionLike\UnionTypesRector::class);

    // better phpunit
    $services->set(\Rector\PhpSpecToPHPUnit\Rector\Class_\AddMockPropertiesRector::class);
    $services->set(\Rector\PhpSpecToPHPUnit\Rector\Variable\MockVariableToPropertyFetchRector::class);
    $services->set(\Rector\PhpSpecToPHPUnit\Rector\Class_\PhpSpecClassToPHPUnitClassRector::class);
    $services->set(\Rector\PhpSpecToPHPUnit\Rector\Class_\PhpSpecClassToPHPUnitClassRector::class);
    $services->set(\Rector\PhpSpecToPHPUnit\Rector\ClassMethod\PhpSpecMethodToPHPUnitMethodRector::class);
    $services->set(\Rector\PhpSpecToPHPUnit\Rector\MethodCall\PhpSpecMocksToPHPUnitMocksRector::class);
    $services->set(\Rector\PhpSpecToPHPUnit\Rector\MethodCall\PhpSpecPromisesToPHPUnitAssertRector::class);
    $services->set(\Rector\PhpSpecToPHPUnit\Rector\Class_\RenameSpecFileToTestFileRector::class);
};