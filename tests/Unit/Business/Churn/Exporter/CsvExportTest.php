<?php

declare(strict_types=1);

namespace Phauthentic\CognitiveCodeAnalysis\Tests\Unit\Business\Churn\Exporter;

use Phauthentic\CognitiveCodeAnalysis\Business\Churn\Exporter\CsvExporter;
use Phauthentic\CognitiveCodeAnalysis\CognitiveAnalysisException;
use PHPUnit\Framework\Attributes\Test;

/**
 *
 */
class CsvExportTest extends AbstractExporterTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->exporter = new CsvExporter();
        $this->filename = sys_get_temp_dir() . '/test_metrics.csv';
    }

    #[Test]
    public function testExport(): void
    {
        $classes = $this->getTestData();

        $this->exporter->export($classes, $this->filename);

        $this->assertFileEquals(
            expected: __DIR__ . '/CsvExporterContent.csv',
            actual: $this->filename
        );
    }

    #[Test]
    public function testNotWriteableFile(): void
    {
        $this->expectException(CognitiveAnalysisException::class);
        $this->expectExceptionMessage('Directory /not/writable does not exist for file /not/writable/file.csv');

        $this->exporter->export([], '/not/writable/file.csv');
    }
}
