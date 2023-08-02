<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter PDF Library
 *
 * Generate PDF's in your CodeIgniter applications.
 *
 * @package			CodeIgniter
 * @subpackage		Libraries
 * @category		Libraries
 * @author			Chris Harvey
 * @license			MIT License
 * @link			https://github.com/chrisnharvey/CodeIgniter-PDF-Generator-Library
 */
require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');
require_once(dirname(__FILE__) . '/dompdf/lib/html5lib/Parser.php');
require_once(dirname(__FILE__) . '/dompdf/lib/php-font-lib/src/FontLib/Autoloader.php');
require_once(dirname(__FILE__) . '/dompdf/lib/php-svg-lib/src/autoload.php');
require_once(dirname(__FILE__) . '/dompdf/src/Autoloader.php');

use Dompdf\Dompdf;
class Pdf extends Dompdf{
    /**
     * PDF filename
     * @var String
     */
    public $filename;
    public function __construct(){
        parent::__construct();
        $this->filename = "laporan.pdf";
    }
    /**
     * Get an instance of CodeIgniter
     *
     * @access    protected
     * @return    void
     */
    protected function ci()
    {
        return get_instance();
    }
    /**
     * Load a CodeIgniter view into domPDF
     *
     * @access    public
     * @param    string    $view The view to load
     * @param    array    $data The view data
     * @return    void
     */
    public function load_view($view, $data = array()){
        $html = $this->ci()->load->view($view, $data, TRUE);
        $this->load_html($html);
        // Render the PDF
        
        $this->render();
            // Output the generated PDF to Browser
        $this->stream($this->filename, array("Attachment" => false));
    }
} 