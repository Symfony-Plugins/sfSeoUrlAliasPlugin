<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * sfSeoUrlFriendly filter form base class.
 *
 * @package    consaltex
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasesfSeoUrlFriendlyFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'internal_url' => new sfWidgetFormFilterInput(),
      'external_url' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'internal_url' => new sfValidatorPass(array('required' => false)),
      'external_url' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_seo_url_friendly_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfSeoUrlFriendly';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'internal_url' => 'Text',
      'external_url' => 'Text',
    );
  }
}
