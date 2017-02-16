<?php

namespace Insasse\CSVImport\Block\System\Config;

use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class ImportButton extends Field
{
  /**
   * @var string
   */
  protected $_template = 'Insasse_CSVImport::system/config/import_button.phtml';

  /**
   * @param Context $context
   * @param array $data
   */
  public function __construct(Context $context, array $data = []) {
    parent::__construct($context, $data);
  }

  /**
   * Remove scope label
   *
   * @param  AbstractElement $element
   * @return string
   */
  public function render(AbstractElement $element) {
    $element->unsScope()->unsCanUseWebsiteValue()->unsCanUseDefaultValue();
    return parent::render($element);
  }

  /**
   * Return element html
   *
   * @param  AbstractElement $element
   * @return string
   */
  protected function _getElementHtml(AbstractElement $element) {
    return $this->_toHtml();
  }

  /**
   * Return ajax url for collect button
   *
   * @return string
   */
  public function getAjaxUrl() {
    return $this->getUrl('csvimport/system_config/importbutton');
  }

  /**
   * Generate collect button html
   *
   * @return string
   */
  public function getButtonHtml() {
    $button = $this->getLayout()
      ->createBlock('Magento\Backend\Block\Widget\Button')
      ->setData([
        'id' => 'import_button',
        'label' => __('Import'),
      ]);

    return $button->toHtml();
  }
}
?>
