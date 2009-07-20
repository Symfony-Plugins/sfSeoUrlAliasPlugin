<?php

/**
 * sfSeoUrlFriendly form base class.
 *
 * @package    consaltex
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasesfSeoUrlFriendlyForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'internal_url' => new sfWidgetFormInput(),
      'external_url' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'sfSeoUrlFriendly', 'column' => 'id', 'required' => false)),
      'internal_url' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'external_url' => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'sfSeoUrlFriendly', 'column' => array('external_url')))
    );

    $this->widgetSchema->setNameFormat('sf_seo_url_friendly[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfSeoUrlFriendly';
  }


}
