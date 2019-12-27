<?php
class Fungsi
{
    protected $ci;
    function __construct()
    {
        $this->ci = &get_instance();
    }

    function PdfGenerator($html, $filename, $paper, $orientation)
    {
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($paper, $orientation);

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream($filename, array('Attachment' => 0));
    }
}
