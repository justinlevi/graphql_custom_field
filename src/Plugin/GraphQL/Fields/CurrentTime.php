<?php

namespace Drupal\custom_graphql_field\Plugin\GraphQL\Fields;

use Drupal\Core\DependencyInjection\DependencySerializationTrait;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\graphql\Plugin\GraphQL\Fields\FieldPluginBase;
use Drupal\custom_graphql_field\TimeUtilities;
use Drupal\graphql\Plugin\GraphQL\PluggableSchemaBuilderInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Youshido\GraphQL\Execution\ResolveInfo;

/**
 * List everything we've got in our page.
 *
 * @GraphQLField(
 *   id = "currentTime",
 *   secure = true,
 *   name = "currentTime",
 *   type = "String",
 *   multi = false,
 *   response_cache_max_age = 0
 * )
 */
class CurrentTime extends FieldPluginBase implements ContainerFactoryPluginInterface {
  use DependencySerializationTrait;

  /**
   * The page instance.
   *
   * @var \Drupal\graphql_plugin_test\CurrentTime
   */
  protected $timeUtilities;

  /**
   * {@inheritdoc}
   */
  public function resolveValues($value, array $args, ResolveInfo $info) {
      yield $this->timeUtilities->now();
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $pluginId, $pluginDefinition) {
    return new static($configuration, $pluginId, $pluginDefinition, new TimeUtilities());
  }

  /**
   * {@inheritdoc}
   */
  public function __construct(array $configuration, $pluginId, $pluginDefinition, TimeUtilities $timeUtilities) {
    $this->timeUtilities = $timeUtilities;
    parent::__construct($configuration, $pluginId, $pluginDefinition);
  }

  /**
   * {@inheritdoc}
   */
  public function getDefinition(PluggableSchemaBuilderInterface $schemaBuilder) {
    // TODO: Implement getDefinition() method.
  }
}
