<?php

namespace App\Controllers;

use Config\Services;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\BarangModel;
use App\Models\PemusnahanBarangModel;
use App\Models\PendanaanModel;
use App\Models\UserModel;
use App\Models\PeminjamanBarangModel;
use App\Models\DokumentasiModel;
use App\Models\PeminjamanRuanganModel;
use App\Models\MaintenanceModel;
use App\Models\FakultasModel;
use App\Models\ProdiModel;
use App\Models\GedungModel;
use App\Models\RuanganModel;
use App\Models\ReferensiModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security, be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */

    protected $modelBarang;
    protected $modelDokumentasi;
    protected $modelFakultas;
    protected $modelGedung;
    protected $modelMaintenance;
    protected $modelPemusnahanBarang;
    protected $modelPeminjamanBarang;
    protected $modelPeminjamanRuangan;
    protected $modelPendanaan;
    protected $modelProdi;
    protected $modelRuangan;
    protected $modelUser;
    protected $modelReferensi;
    protected $req;
    protected $session;
    protected $calendar;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $this->req = Services::request();
        $this->session = Services::session();
        $this->calendar = Services::calendar();

        // Inisialisasi object Model
        $this->modelBarang = new BarangModel();
        $this->modelPemusnahanBarang = new PemusnahanBarangModel();
        $this->modelPendanaan = new PendanaanModel();
        $this->modelUser = new UserModel();
        $this->modelPeminjamanBarang = new PeminjamanBarangModel();
        $this->modelDokumentasi = new DokumentasiModel();
        $this->modelPeminjamanRuangan = new PeminjamanRuanganModel();
        $this->modelPeminjamanBarang = new PeminjamanBarangModel();
        $this->modelMaintenance = new MaintenanceModel();
        $this->modelFakultas = new FakultasModel();
        $this->modelProdi = new ProdiModel();
        $this->modelGedung = new GedungModel();
        $this->modelRuangan = new RuanganModel();
        $this->modelReferensi = new ReferensiModel();
    }
}
