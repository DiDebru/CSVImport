<?php
namespace \Insasse\CSVImport\Controller;


class Import {
  /**
   * CSV Processor
   *
   * @var \Magento\Framework\File\Csv
   */
  protected $csvProcessor;

  /**
   * CSV file to import.
   *
   * @var
   */
  protected $file;

  public function __construct(\Magento\Framework\File\Csv $csvProcessor) {
    $this->csvProcessor = $csvProcessor;
  }

  public function importFromCsvFile($file) {
    $file = $this->downloadFile('');
    if (empty($file)) {
      throw new \Magento\Framework\Exception\LocalizedException(__('Invalid file upload attempt.'));
    }
    $importProductRawData = $this->csvProcessor->getData($file);

    foreach ($importProductRawData as $rowIndex => $dataRow) {
      \Zend_Debug::dump($dataRow);
    }
    die();
  }

  private function downloadFile($url) {
    $url = 'http://projects.productdata.cloud/hipsterfashion/feed.csv';
    $file = fopen($url, 'r');
    return $file;
  }
}

