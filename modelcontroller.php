<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asset extends CI_Controller
{

    public function __construct(){
        include_once APPPATH . '/third_party/fpdf182/fpdf.php';
        Parent::__construct();
        auth(true);
    }


    public function index()
    {
        $this->load->model('asset_model');
        $assets = $this->asset_model->get_one();
        $assets2 = $this->asset_model->get_one2();
        $assets_inv = $this->asset_model->get_one_inv();
        $assets_his = $this->asset_model->get_one_his();
        $data = [
            'title'         => 'Assets',
            'contents'      => $assets,
            'contents2'      => $assets2,
            'contents_inv'  => $assets_inv,
            'contents_his'  => $assets_his,
            'content'       => 'asset/index',
            'vendor_js'     => array(
                '/assets/js/asset.js'
            ),
        ];
        return $this->load->view('component/template', $data);
    }

    public function inputOpname()
    {
        $data = [
            'title'         => 'Input Asset Yang Di Temukan',
            'content'       => 'asset/inputopname',
            'vendor_js'     => array(
                '/assets/js/asset.js'
            ),
        ];
        return $this->load->view('component/template', $data);
    }

    public function dashboardAsset()
    {
        $this->load->model('asset_model');
        $assets_chart = $this->asset_model->get_asset_chart();
        $assets_opname = $this->asset_model->get_asset_opname();
        $assets_blmopname = $this->asset_model->get_asset_blmopname();
        $assets_chart = json_encode($assets_chart);
        $assets_opname = json_encode($assets_opname);
        $assets_blmopname = json_encode($assets_blmopname);
        $data = [
            'title'         => 'Dashboard Asset',
            'data'  => $assets_chart,
            'data1'  => $assets_opname,
            'data2'  => $assets_blmopname,
            'content'       => 'asset/dashboardasset',
            'vendor_js'     => array(
                '/assets/js/asset.js'
            ),
        ];
        return $this->load->view('component/template', $data);
    }

    public function historyAsset()
    {
        $this->load->model('asset_model');
        $assets_his = $this->asset_model->get_one_his();
        $data = [
            'title'         => 'History Assets Yang Tidak Di Temukan',
            'contents_his'  => $assets_his,
            'content'       => 'asset/historyasset',
            'vendor_js'     => array(
                '/assets/js/asset.js'
            ),
        ];
        return $this->load->view('component/template', $data);
    }


    public function korAsset()
    {
        $this->load->model('asset_model');
        $assets = $this->asset_model->get_one();
        $assets2 = $this->asset_model->get_one2();
        $assets_inv = $this->asset_model->get_one_inv();
        $assets_his = $this->asset_model->get_one_his();
        $data = [
            'title'         => 'Assets',
            'contents'      => $assets,
            'contents2'      => $assets2,
            'contents_inv'  => $assets_inv,
            'contents_his'  => $assets_his,
            'content'       => 'asset/korasset',
            'vendor_js'     => array(
                '/assets/js/asset.js'
            ),
        ];
        return $this->load->view('component/template', $data);
    }

    public function historyAssetAll()
    {
        $this->load->model('asset_model');
        $assets = $this->asset_model->get_one();
        $assets_his = $this->asset_model->get_one_his();
        $data = [
            'title'         => 'History Assets Yang Tidak Di Temukan',
            'contents'      => $assets,
            'contents_his'  => $assets_his,
            'content'       => 'asset/historyassetall',
            'vendor_js'     => array(
                '/assets/js/asset.js'
            ),
        ];
        return $this->load->view('component/template', $data);
    }

    public function uploadAsset()
    {
        $this->load->model('asset_model');
        $assets = $this->asset_model->get_one_all();
        $data = [
            'title'         => 'Data Opname Data All',
            'contents'      => $assets,
            'content'       => 'asset/upload',
            'vendor_js'     => array(
                '/assets/js/asset.js'
            ),
        ];

        $this->load->view('component/template', $data);
    }

    public function inputAsset()
    {
        $this->load->model('asset_model');
        $assets = $this->asset_model->get_one_all();
        $data = [
            'title'         => 'Upload Assset',
            'contents'      => $assets,
            'content'       => 'asset/inputasset',
            'vendor_js'     => array(
                '/assets/js/asset.js'
            ),
        ];

        $this->load->view('component/template', $data);
    }

    public function historyMutasi()
    {
        $this->load->model('mutasi_model');  
        if (!empty(user()->roles) && (user()->roles == 'asset' || user()->roles == 'accounting'))
        {
            $contents = $this->mutasi_model->get_all_acc(user()->hierarchy_role);
        } else
        {
            $contents = $this->mutasi_model->get_all();  
        }  


        $data = [
            'title'         => 'History Mutasi Asset',
            'contents'      => $contents,
            'content'       => 'asset/historymutasi',
            'vendor_js'     => array(
                '/assets/js/asset.js'
            ),
        ];

        $this->load->view('component/template', $data);    
    }    

    public function assetByLabel(){

        $this->load->model('asset_model');
        $asset = $this->asset_model->asset_by_hierarchy(140);

        print_r($asset);
    }

    public function mutasiAsset()
    {
        $this->load->model('users_model');
        $this->load->model('asset_model');
        $this->load->model('mutasi_model'); 
        $table = $this->users_model->get_all();
        $asset = $this->asset_model->get_asset();
        $ccba  = $this->mutasi_model->get_all_ccba(); 

        $data = [
            'title'         => 'Mutasi Asset',
            'table'         => $table,
            'asset'         => $asset,
            'ccba'          => $ccba,
            'content'       => 'asset/mutasi',
            'vendor_js'     => array(
                '/assets/js/asset.js'
            ),
        ];

        $this->load->view('component/template', $data);
    }

    public function inputMutasi()
    {
        $response['status'] = 200;
        $response['message'] = 'Mutasi berhasil dilakukan';
        $response['nofile'] = '3';
        echo json_encode($response);
    }

    public function createFile()
    {

      $params = $this->input->post();
        $date = date('d-m-Y');

        $this->load->model('mutasi_model');     
        $mutasi = $this->mutasi_model->input_mutasi($params);
        
        if($mutasi) {
            $image1 = "Untitled.jpg";
            $pdf = new FPDF();
            $pdf->AddPage('P', 'A4');
            $pdf->Image($image1,0,0,210,297);
            $pdf->SetAutoPageBreak(true, 10);
            $pdf->SetFont('Arial', '', 8);
            $pdf->SetTopMargin(10);
            $pdf->SetLeftMargin(10);
            $pdf->SetRightMargin(10);
            $pdf->Text(58, 50, $date);
            $pdf->Text(20, 78, 'NOMOR ASSET');
            $pdf->Text(80, 78, ':  '.$params['asset']);
            $pdf->Text(20, 83, 'NAMA ASSET');
            $pdf->Text(80, 83, ':  '.strstr($params['nmasset'], '--', true));
            $pdf->Text(20, 88, 'KABAG, COSTCENTER ASAL');
            $pdf->Text(80, 88, ':  -');
            $pdf->Text(20, 93, 'KABAG, COSTCENTER PENERIMA');
            $pdf->Text(80, 93, ':  '.$params['lokasi']);   
            $pdf->Text(20, 98, 'KETERANGAN');
            $pdf->Text(80, 98, ':  '.$params['keterangan']);  
           // echo base_url().'uploads/asset/'.$params['nofile'].'.pdf';
            $pdf->Output(F,'uploads/asset/'.$params['nofile'].'.pdf'); 
           
            $response['status'] = 200;
            $response['message'] = 'Mutasi berhasil dilakukan';
            $this->email($params['asset']);
          //  echo json_encode($response);
            return;
        }
        return false;
        echo base_url();  

    }

    private function email($app)
    {
        $this->load->library('email');
        $ci = get_instance();
        $config['protocol']     = "smtp";
        $config['smtp_host']    = "172.16.0.6";
        $config['smtp_port']    = 587;
        $config['smtp_user']    = "monitoring@ptbmi.com";
        $config['smtp_pass']    = "Resign123456";
        $config['charset']      = "utf-8";
        $config['mailtype']     = "html";
        $config['newline']      = "\r\n";
        $ci->email->initialize($config);
        $ci->email->from("monitoring@ptbmi.com");
        $ci->email->to("edp.sirin@ptbmi.com");
        $ci->email->subject("Memo Mutasi Asset " . $row->fk_no_document . "");
        $ci->email->message("Dengan hormat,<br/><br/>Terdapat Memo Mutasi yang perlu di lakukan Approval<br/>No Mutasi : 001 <br/>");
        $send = $this->email->send();
    
        if ($send) { // Jika Email berhasil dikirim
            $response = array('status' => 'Sukses', 'message' => 'Email berhasil dikirim');
        } else { // Jika Email Gagal dikirim
            $response = array('status' => 'Gagal', 'message' => 'Email gagal dikirim');
        }

        return true;
    }

    public function do_barcode_check(){
        $barcode = $this->input->post('barcode');
        $sn = (int)substr($barcode, 13, 1);
        $barcode = substr($barcode, 0, 12);

        echo json_encode($this->get_asset_by_barcode($barcode,$sn));
    }

    public function execute_opname(){
        $params = $this->input->post();
        $this->load->model('opname_model');
        $this->load->model('asset_model');

        if($this->input->post('is_invalid')){

            $insert = $this->opname_model->insert_invalid($params);
            $response = array();
            if($insert){
                $response['status'] = 200;
                $response['message'] = 'Invalid Asset berhasil ditambahkan';
            }else{
                $response['status'] = 401;
                $response['message'] = 'Invalid Asset gagal ditambahkan';         
            }

            echo json_encode($response);
            return;
        }
        
        $sn = (int)substr($params['asset_code'], 25, 1);
        $substr = substr($params['asset_code'], 0, 12);
        $asset = $this->asset_model->get_by_asset_with_sn($substr,$sn); 

        if(!$asset){
            return false;
        }
        
        $opname = $this->opname_model->insert($params);
        if($opname){
            $response['status'] = 200;
            $response['message'] = 'Opname berhasil dilakukan';
            echo json_encode($response);
            return;
        }

        return false;
    }

    public function loadPdf(){
        $this->load->model('mutasi_model');
        $id = $_GET['id'];
        $idmut = $_GET['id1'];

        $status  = $this->mutasi_model->get_status($idmut);

        if ($status[0]->status == 1)
        {
            header("Content-type: application/pdf");
            header("Content-Disposition: inline; filename=uploads/asset/".$id."_app.pdf");
            @readfile('uploads/asset/'.$id.'_app.pdf');
        } else
        {
            header("Content-type: application/pdf");
            header("Content-Disposition: inline; filename=uploads/asset/".$id.".pdf");
            @readfile('uploads/asset/'.$id.'.pdf');
        }       
    }

    private function get_asset_by_barcode($barcode,$sn){
        $this->load->model('asset_model');
        $asset = $this->asset_model->get_by_asset_with_sn($barcode,$sn);
       
   //     if(!$asset){
            $response['status'] = 404;
            $response['result'] = '<input type="hidden" name="is_invalid" value="true">Di mohon untuk tidak mengosongkan deskripsi , kondisi dan penjelasan';
            return $response;
     //   }

        // $html = '<table class="table is-narrow is-fullwidth barcode-scanner-list"><tbody>';

        // if(count($asset)){
        //     foreach($asset as $key => $value){
        //         if ($key != 'ID') {
        //              $html .= '<tr><th>'.$key.'</th><td>'.$value.'</td></tr>';
        //         }

                
        //     }
        // }

        // $html .= '<tbody></table>';
        // $response['status'] = 200;
        // $response['result'] = $html;
        // return $response;
    }

    public function approve(){
        $this->load->model('mutasi_model');
        $id = $this->input->post('id');
        $sts = $this->input->post('sts');
        $mutasiapprove = $this->mutasi_model->approve($id,$sts);
        if($mutasiapprove){
            $response['status'] = 200;
            echo json_encode($response);
            return;
        }
        $response['status'] = 404;
        echo json_encode($response);
        return;
    }

    public function approve1(){
        $this->load->model('mutasi_model');
        $id = $this->input->post('id');
        $asset = $this->input->post('asset');
        $sts = $this->input->post('sts');
        $mutasiapprove = $this->mutasi_model->approve($id,$sts);
        
        if($mutasiapprove){
            $url = 'http://172.16.0.56:8080';
            $myvars = 'id_uploader=' . $asset;
            $ch = curl_init( $url );
            curl_setopt( $ch, CURLOPT_POST, 1);
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt( $ch, CURLOPT_HEADER, 0);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($ch);
         
            if ($result == 'success')
            {
                $response['status'] = 200;
                echo json_encode($response);
                return;
            } else
            {
                $response['status'] = 404;
                echo json_encode($response);
                return;  
            }          
        }

        $response['status'] = 404;
        echo json_encode($response);
        return;
    }

    public function get_assets_his(){
        $month = date('m');
        $month = $month + 1;
        $year = date('Y');

        $this->load->library('datatables');
        $this->datatables->select('
           asset, 
            sno, 
            cost_center, 
            UPPER(asset_description), 
            UPPER(name),
            num,
            UPPER(month),
            years'
        );
        $this->datatables->from('(select CASE
                WHEN month = 1 THEN "Januari"
                WHEN month = 2 THEN "Februari"
                WHEN month = 3 THEN "Maret"
                WHEN month = 4 THEN "April"
                WHEN month = 5 THEN "Mei"
                WHEN month = 6 THEN "Juni"
                WHEN month = 7 THEN "Juli"
                WHEN month = 8 THEN "Agustus"
                WHEN month = 9 THEN "September"
                WHEN month = 10 THEN "Oktober"
                WHEN month = 11 THEN "November"
                ELSE "Desember"
            END as month,
            month as num,
            asset, 
            sno, 
            cap_date, 
            odep_start, 
            cost_center, 
            asset_description, 
            h.name,
            funloc,
            no_equipment,
            qty, 
            bun,
            busA,
            years from assets_temp LEFT JOIN `hierarchy` `h` ON `h`.`id` = `assets_temp`.`hierarchy` WHERE `hierarchy` IN (SELECT descendant FROM hierarchy_closure WHERE ancestor = '.user()->hierarchy_id.') AND CONCAT(asset,`month`,years) NOT IN
            (SELECT CONCAT(asset,`month`,years) FROM `assets` LEFT JOIN `opnames` ON `assets`.`asset` = `opnames`.`asset_code` LEFT JOIN `users` 
            ON `users`.`nid` = `opnames`.`user_id` LEFT JOIN `working_history` ON `working_history`.`user_id` = `users`.`id` and working_history.is_active = 1 LEFT JOIN `hierarchy` 
            ON `hierarchy`.`id` = `working_history`.`hierarchy_id` LEFT JOIN `hierarchy` `h` ON `h`.`id` = `assets`.`hierarchy` WHERE `hierarchy` 
            IN (SELECT descendant FROM hierarchy_closure WHERE ancestor = '.user()->hierarchy_id.') AND MONTH(opnames.created_at) <> "'.$month.'" OR YEAR(opnames.created_at) <> "'.$year.'") order by month desc) tbl1');

        print_r($this->datatables->generate());
       // print_r($this->db->last_query());

    }

    public function get_assets_all(){
        $month = date('m');
        $year = date('Y');
        $plant = $this->input->post('plant');

        $this->load->library('datatables');
        $this->datatables->select('
            UPPER(asset), 
            UPPER(assets.sno), 
            UPPER(cap_date), 
            UPPER(odep_start), 
            UPPER(cost_center), 
            UPPER(asset_description),
            UPPER(funloc),
            UPPER(no_equipment),
            UPPER(qty), 
            UPPER(bun), 
            UPPER(busA), 
            UPPER(h.name) as pemilik,
            "" as status'
        );
        $this->datatables->from('assets');
        $this->datatables->join('(SELECT * FROM opnames WHERE id IN (SELECT MAX(id) FROM opnames GROUP BY asset_code)) opnames', 'assets.asset = opnames.asset_code', 'left');
        $this->datatables->join('users', 'users.nid = opnames.user_id', 'left');
        $this->datatables->join('working_history', 'working_history.user_id = users.id and working_history.is_active = 1', 'left');
        $this->datatables->join('hierarchy', 'hierarchy.id = working_history.hierarchy_id', 'left');
        $this->datatables->join('hierarchy h', 'h.id = assets.hierarchy', 'left');
        $this->datatables->where('h.name is not null');
        if (($plant == 2) or (user()->hierarchy_role == 2))
        {
            $this->datatables->where('(assets.busA = 12 or assets.busA = 20)');
        } else if (($plant == 3) or (user()->hierarchy_role == 3))
        {
            $this->datatables->where('(assets.busA = 5 or assets.busA = 9 or assets.busA = 22)');
        } else if (($plant == 4) or (user()->hierarchy_role == 4))
        {
            $this->datatables->where('(assets.busA = 2 or assets.busA = 23)');
        } else if (($plant == 5) or (user()->hierarchy_role == 5))
        {
            $this->datatables->where('(assets.busA = 1)');
        } else if (($plant == 6) or (user()->hierarchy_role == 6))
        {
            $this->datatables->where('(assets.busA = 13 or assets.busA = 14 or assets.busA = 19)');
        } else if (($plant == 7) or (user()->hierarchy_role == 7))
        {
            $this->datatables->where('(assets.busA = 10 or assets.busA = 15)');
        } else if (($plant == 8) or (user()->hierarchy_role == 8))
        {
            $this->datatables->where('(assets.busA = 16)');
        } else if (($plant == 9) or (user()->hierarchy_role == 9))
        {
            $this->datatables->where('(assets.busA = 11)');
        } else if (($plant == 10) or (user()->hierarchy_role == 10))
        {
            $this->datatables->where('(assets.busA = 4)');
        } else if (($plant == 11) or (user()->hierarchy_role == 11))
        {
            $this->datatables->where('(assets.busA = 3)');
        } else if (($plant == 12) or (user()->hierarchy_role == 12))
        {
            $this->datatables->where('(assets.busA = 14)');
        } else if (($plant == 13) or (user()->hierarchy_role == 13))
        {
            $this->datatables->where('(assets.busA = 13)');
        } 

        // $this->datatables->generate();
       // print_r($this->db->last_query());

        print_r($this->datatables->generate());
    }

    public function dispose_asset(){
        $asset = $this->input->post('asset');
        $sno = $this->input->post('sno');
        $keterangan = $this->input->post('keterangan');
        $this->load->model('asset_model');     
        $dispose = $this->asset_model->dispose_asset($asset,$sno,$keterangan);
        
        if($dispose) {
            $response['status'] = 200;
            $response['message'] = 'Dispose Asset berhasil dilakukan';
            echo json_encode($response);
        }

        return false;
    }

    public function get_assets_all_inv(){
        $month = date('m');
        $year = date('Y');
        $plant = $this->input->post('plant');

        $this->load->library('datatables');
        $this->datatables->select('
            UPPER(asset), 
            UPPER(assets.sno) as sno, 
            UPPER(cap_date), 
            UPPER(odep_start), 
            UPPER(cost_center), 
            UPPER(asset_description),
            UPPER(funloc),
            UPPER(no_equipment),
            UPPER(qty), 
            UPPER(bun), 
            UPPER(busA), 
            UPPER(h.name) as pemilik,
            "" as status'
        );

        $this->datatables->from('assets');
        $this->datatables->join('(SELECT * FROM opnames WHERE id IN (SELECT MAX(id) FROM opnames GROUP BY asset_code)) opnames', 'assets.asset = opnames.asset_code', 'left');
        $this->datatables->join('users', 'users.nid = opnames.user_id', 'left');
        $this->datatables->join('working_history', 'working_history.user_id = users.id and working_history.is_active = 1', 'left');
        $this->datatables->join('hierarchy', 'hierarchy.id = working_history.hierarchy_id', 'left');
        $this->datatables->join('hierarchy h', 'h.id = assets.hierarchy', 'left');
        $this->datatables->where('h.name is null');
        $this->datatables->where('assets.dispose = 0');
        if (($plant == 2) or (user()->hierarchy_role == 2))
        {
            $this->datatables->where('(assets.busA = 12 or assets.busA = 20)');
        } else if (($plant == 3) or (user()->hierarchy_role == 3))
        {
            $this->datatables->where('(assets.busA = 5 or assets.busA = 9 or assets.busA = 22)');
        } else if (($plant == 4) or (user()->hierarchy_role == 4))
        {
            $this->datatables->where('(assets.busA = 2 or assets.busA = 23)');
        } else if (($plant == 5) or (user()->hierarchy_role == 5))
        {
            $this->datatables->where('(assets.busA = 1)');
        } else if (($plant == 6) or (user()->hierarchy_role == 6))
        {
            $this->datatables->where('(assets.busA = 13 or assets.busA = 14 or assets.busA = 19)');
        } else if (($plant == 7) or (user()->hierarchy_role == 7))
        {
            $this->datatables->where('(assets.busA = 10 or assets.busA = 15)');
        } else if (($plant == 8) or (user()->hierarchy_role == 8))
        {
            $this->datatables->where('(assets.busA = 16)');
        } else if (($plant == 9) or (user()->hierarchy_role == 9))
        {
            $this->datatables->where('(assets.busA = 11)');
        } else if (($plant == 10) or (user()->hierarchy_role == 10))
        {
            $this->datatables->where('(assets.busA = 4)');
        } else if (($plant == 11) or (user()->hierarchy_role == 11))
        {
            $this->datatables->where('(assets.busA = 3)');
        } else if (($plant == 12) or (user()->hierarchy_role == 12))
        {
            $this->datatables->where('(assets.busA = 14)');
        } else if (($plant == 13) or (user()->hierarchy_role == 13))
        {
            $this->datatables->where('(assets.busA = 13)');
        } 
        print_r($this->datatables->generate());
    }

    public function get_assets_all_temp(){
        $month = date('m');
        $year = date('Y');
        $plant = $this->input->post('plant');
        $this->load->library('datatables');
        $this->datatables->select('
            UPPER(asset), 
            UPPER(assets.sno) as sno, 
            UPPER(cap_date), 
            UPPER(odep_start), 
            UPPER(cost_center), 
            UPPER(asset_description),
            UPPER(funloc),
            UPPER(no_equipment),
            UPPER(qty), 
            UPPER(bun), 
            UPPER(busA), 
            UPPER(h.name) as pemilik,
            UPPER(dispose_description)'
        );
        $this->datatables->from('assets');
        $this->datatables->join('(SELECT * FROM opnames WHERE id IN (SELECT MAX(id) FROM opnames GROUP BY asset_code)) opnames', 'assets.asset = opnames.asset_code', 'left');
        $this->datatables->join('users', 'users.nid = opnames.user_id', 'left');
        $this->datatables->join('working_history', 'working_history.user_id = users.id and working_history.is_active = 1', 'left');
        $this->datatables->join('hierarchy', 'hierarchy.id = working_history.hierarchy_id', 'left');
        $this->datatables->join('hierarchy h', 'h.id = assets.hierarchy', 'left');
        $this->datatables->where('h.name is null');
        $this->datatables->where('assets.dispose = 1');
        if (($plant == 2) or (user()->hierarchy_role == 2))
        {
            $this->datatables->where('(assets.busA = 12 or assets.busA = 20)');
        } else if (($plant == 3) or (user()->hierarchy_role == 3))
        {
            $this->datatables->where('(assets.busA = 5 or assets.busA = 9 or assets.busA = 22)');
        } else if (($plant == 4) or (user()->hierarchy_role == 4))
        {
            $this->datatables->where('(assets.busA = 2 or assets.busA = 23)');
        } else if (($plant == 5) or (user()->hierarchy_role == 5))
        {
            $this->datatables->where('(assets.busA = 1)');
        } else if (($plant == 6) or (user()->hierarchy_role == 6))
        {
            $this->datatables->where('(assets.busA = 13 or assets.busA = 14 or assets.busA = 19)');
        } else if (($plant == 7) or (user()->hierarchy_role == 7))
        {
            $this->datatables->where('(assets.busA = 10 or assets.busA = 15)');
        } else if (($plant == 8) or (user()->hierarchy_role == 8))
        {
            $this->datatables->where('(assets.busA = 16)');
        } else if (($plant == 9) or (user()->hierarchy_role == 9))
        {
            $this->datatables->where('(assets.busA = 11)');
        } else if (($plant == 10) or (user()->hierarchy_role == 10))
        {
            $this->datatables->where('(assets.busA = 4)');
        } else if (($plant == 11) or (user()->hierarchy_role == 11))
        {
            $this->datatables->where('(assets.busA = 3)');
        } else if (($plant == 12) or (user()->hierarchy_role == 12))
        {
            $this->datatables->where('(assets.busA = 14)');
        } else if (($plant == 13) or (user()->hierarchy_role == 13))
        {
            $this->datatables->where('(assets.busA = 13)');
        } 
        print_r($this->datatables->generate());
    }

    public function get_assets_all_id(){
        $month = date('m');
        $year = date('Y');

        $this->load->library('datatables');
        $this->datatables->select('
            asset, 
            assets.sno as sno, 
            cost_center, 
            UPPER(asset_description), 
            UPPER(h.name) as pemilik'
        );
        $this->datatables->from('assets');
        $this->datatables->join('(SELECT * FROM opnames WHERE id IN (SELECT MAX(id) FROM opnames GROUP BY asset_code)) opnames', 'assets.asset = opnames.asset_code', 'left');
        $this->datatables->join('users', 'users.nid = opnames.user_id', 'left');
        $this->datatables->join('working_history', 'working_history.user_id = users.id and working_history.is_active = 1', 'left');
        $this->datatables->join('hierarchy', 'hierarchy.id = working_history.hierarchy_id', 'left');
        $this->datatables->join('hierarchy h', 'h.id = assets.hierarchy', 'left');
        $this->datatables->where('hierarchy in (select descendant from hierarchy_closure where ancestor = '.user()->hierarchy_id.')');
        print_r($this->datatables->generate());
    }
 
    public function get_assets(){
        $month = date('m');
        $year = date('Y');

        $this->load->library('datatables');
        $this->datatables->select('
            asset, 
            assets.sno as sno, 
            cost_center, 
            UPPER(asset_description), 
            UPPER(h.name) as pemilik,
            UPPER(hierarchy.name) as name,
            opnames.created_at,
            opnames.asset_condition,
            UPPER(opnames.explanation) as explanation'
        );
        $this->datatables->from('assets');
        $this->datatables->join('(SELECT * FROM opnames WHERE id IN (SELECT MAX(id) FROM opnames GROUP BY asset_code)) opnames', 'assets.asset = opnames.asset_code', 'left');
        $this->datatables->join('users', 'users.nid = opnames.user_id', 'left');
        $this->datatables->join('working_history', 'working_history.user_id = users.id and working_history.is_active = 1', 'left');
        $this->datatables->join('hierarchy', 'hierarchy.id = working_history.hierarchy_id', 'left');
        $this->datatables->join('hierarchy h', 'h.id = assets.hierarchy', 'left');
        $this->datatables->where('hierarchy in (select descendant from hierarchy_closure where ancestor = '.user()->hierarchy_id.')');
        $this->datatables->where('month(opnames.created_at)', $month);
        $this->datatables->where('year(opnames.created_at)', $year);
        print_r($this->datatables->generate());
       //  $this->datatables->generate();
       // print_r($this->db->last_query());
    }

    public function get_assets_vis(){
        $month = date('m');
        $year = date('Y');

        $this->load->library('datatables');
        $this->datatables->select('
            asset, 
            assets.sno as sno, 
            cost_center, 
            UPPER(asset_description), 
            UPPER(h.name) as pemilik,
            UPPER(hierarchy.name) as name,
            opnames.created_at,
            opnames.asset_condition,
            UPPER(opnames.explanation) as explanation'
        );
        $this->datatables->from('assets');
        $this->datatables->join('(SELECT * FROM opnames WHERE id IN (SELECT MAX(id) FROM opnames GROUP BY asset_code)) opnames', 'assets.asset = opnames.asset_code', 'left');
        $this->datatables->join('users', 'users.nid = opnames.user_id', 'left');
        $this->datatables->join('working_history', 'working_history.user_id = users.id and working_history.is_active = 1', 'left');
        $this->datatables->join('hierarchy', 'hierarchy.id = working_history.hierarchy_id', 'left');
        $this->datatables->join('hierarchy h', 'h.id = assets.hierarchy', 'left');
        $this->datatables->where('assets.hierarchy in (select descendant from hierarchy_closure where ancestor = '.user()->hierarchy_id.')');
        $this->datatables->where("(ifnull(month(opnames.created_at),0) != '{$month}' or ifnull(year(opnames.created_at),0) != '{$year}')");
        print_r($this->datatables->generate());
    }

    public function check_invalid(){
        $this->load->model('asset_model');
        $id = $this->input->post('id');
        $invalid = $this->asset_model->get_inv_by_id($id);
        if(!$invalid){
            $response['status'] = 404;
            echo json_encode($response);
            return;
        }

        $response['status'] = 200;
        $response['data'] = $invalid;
        echo json_encode($response);
    }

    public function delete_invalid(){
        $id = $this->input->post('id');
        $this->load->model('asset_model');
        $this->load->model('opname_model');
        $invalid = $this->asset_model->get_inv_by_id($id);
        if($invalid){
            if($this->opname_model->delete_invalid($id)){
                $response['status'] = 200;
                echo json_encode($response);
                return;
            }else{
                $response['status'] = 404;
                echo json_encode($response);
                return;                
            }
        }else{
            $response['status'] = 404;
            echo json_encode($response);
            return;
        }
    }

    public function get_assets_inv(){
        $this->load->library('datatables');
        $this->datatables->select('
            invalids.id,
            invalids.asset, 
            UPPER(invalids.asset_description), 
            UPPER(hierarchy.name), 
            UPPER(invalids.explanation), 
            UPPER(invalids.asset_condition), 
            invalids.created_at,
            "" as action'
        );
        $this->datatables->from('invalids');
        $this->datatables->join('hierarchy', 'hierarchy.id = invalids.user_id', 'left');
        $this->datatables->where('user_id in (select descendant from hierarchy_closure where ancestor = '.user()->hierarchy_id.')');
        print_r($this->datatables->generate());
    }


    public function get_assets_all_id_korasset(){
        $month = date('m');
        $year = date('Y');
        $plant = $this->input->post('plant');

        $this->load->library('datatables');
        $this->datatables->select('
            UPPER(asset), 
            UPPER(assets.sno) as sno,  
            cost_center, 
            UPPER(asset_description), 
            UPPER(h.name) as pemilik,
            UPPER(hierarchy.name) as name'
        );
        $this->datatables->from('assets');
        $this->datatables->join('(SELECT * FROM opnames WHERE id IN (SELECT MAX(id) FROM opnames GROUP BY asset_code)) opnames', 'assets.asset = opnames.asset_code', 'left');
        $this->datatables->join('users', 'users.nid = opnames.user_id', 'left');
        $this->datatables->join('working_history', 'working_history.user_id = users.id and working_history.is_active = 1', 'left');
        $this->datatables->join('hierarchy', 'hierarchy.id = working_history.hierarchy_id', 'left');
        $this->datatables->join('hierarchy h', 'h.id = assets.hierarchy', 'left');
     //   $this->datatables->where('h.name is not null');
        if (($plant == 2) or (user()->hierarchy_role == 2))
        {
            $this->datatables->where('(assets.busA = 12 or assets.busA = 20)');
        } else if (($plant == 3) or (user()->hierarchy_role == 3))
        {
            $this->datatables->where('(assets.busA = 5 or assets.busA = 9 or assets.busA = 22)');
        } else if (($plant == 4) or (user()->hierarchy_role == 4))
        {
            $this->datatables->where('(assets.busA = 2 or assets.busA = 23)');
        } else if (($plant == 5) or (user()->hierarchy_role == 5))
        {
            $this->datatables->where('(assets.busA = 1)');
        } else if (($plant == 6) or (user()->hierarchy_role == 6))
        {
            $this->datatables->where('(assets.busA = 13 or assets.busA = 14 or assets.busA = 19)');
        } else if (($plant == 7) or (user()->hierarchy_role == 7))
        {
            $this->datatables->where('(assets.busA = 10 or assets.busA = 15)');
        } else if (($plant == 8) or (user()->hierarchy_role == 8))
        {
            $this->datatables->where('(assets.busA = 16)');
        } else if (($plant == 9) or (user()->hierarchy_role == 9))
        {
            $this->datatables->where('(assets.busA = 11)');
        } else if (($plant == 10) or (user()->hierarchy_role == 10))
        {
            $this->datatables->where('(assets.busA = 4)');
        } else if (($plant == 11) or (user()->hierarchy_role == 11))
        {
            $this->datatables->where('(assets.busA = 3)');
        } else if (($plant == 12) or (user()->hierarchy_role == 12))
        {
            $this->datatables->where('(assets.busA = 14)');
        } else if (($plant == 13) or (user()->hierarchy_role == 13))
        {
            $this->datatables->where('(assets.busA = 13)');
        }  
        print_r($this->datatables->generate());
        //$this->datatables->generate();
        //print_r($this->db->last_query());
    }

    public function get_assets_korasset(){
        $month = date('m');
        $year = date('Y');
        $plant = $this->input->post('plant');

        $this->load->library('datatables');
        $this->datatables->select('
            asset, 
            assets.sno as sno, 
            cost_center, 
            UPPER(asset_description), 
            UPPER(h.name) as pemilik,
            UPPER(hierarchy.name) as name,
            opnames.created_at,
            opnames.asset_condition,
            UPPER(opnames.explanation) as explanation'
        );
        $this->datatables->from('assets');
        $this->datatables->join('(SELECT * FROM opnames WHERE id IN (SELECT MAX(id) FROM opnames GROUP BY asset_code)) opnames', 'assets.asset = opnames.asset_code', 'left');
        $this->datatables->join('users', 'users.nid = opnames.user_id', 'left');
        $this->datatables->join('working_history', 'working_history.user_id = users.id and working_history.is_active = 1', 'left');
        $this->datatables->join('hierarchy', 'hierarchy.id = working_history.hierarchy_id', 'left');
        $this->datatables->join('hierarchy h', 'h.id = assets.hierarchy', 'left');
        // $this->datatables->where('hierarchy in (select descendant from hierarchy_closure where ancestor = '.user()->hierarchy_id.')');
        $this->datatables->where('month(opnames.created_at)', $month);
        $this->datatables->where('year(opnames.created_at)', $year);
   //     $this->datatables->where('h.name is not null');
        if (($plant == 2) or (user()->hierarchy_role == 2))
        {
            $this->datatables->where('(assets.busA = 12 or assets.busA = 20)');
        } else if (($plant == 3) or (user()->hierarchy_role == 3))
        {
            $this->datatables->where('(assets.busA = 5 or assets.busA = 9 or assets.busA = 22)');
        } else if (($plant == 4) or (user()->hierarchy_role == 4))
        {
            $this->datatables->where('(assets.busA = 2 or assets.busA = 23)');
        } else if (($plant == 5) or (user()->hierarchy_role == 5))
        {
            $this->datatables->where('(assets.busA = 1)');
        } else if (($plant == 6) or (user()->hierarchy_role == 6))
        {
            $this->datatables->where('(assets.busA = 13 or assets.busA = 14 or assets.busA = 19)');
        } else if (($plant == 7) or (user()->hierarchy_role == 7))
        {
            $this->datatables->where('(assets.busA = 10 or assets.busA = 15)');
        } else if (($plant == 8) or (user()->hierarchy_role == 8))
        {
            $this->datatables->where('(assets.busA = 16)');
        } else if (($plant == 9) or (user()->hierarchy_role == 9))
        {
            $this->datatables->where('(assets.busA = 11)');
        } else if (($plant == 10) or (user()->hierarchy_role == 10))
        {
            $this->datatables->where('(assets.busA = 4)');
        } else if (($plant == 11) or (user()->hierarchy_role == 11))
        {
            $this->datatables->where('(assets.busA = 3)');
        } else if (($plant == 12) or (user()->hierarchy_role == 12))
        {
            $this->datatables->where('(assets.busA = 14)');
        } else if (($plant == 13) or (user()->hierarchy_role == 13))
        {
            $this->datatables->where('(assets.busA = 13)');
        }   

       // $this->datatables->generate();
       // print_r($this->db->last_query());
        print_r($this->datatables->generate());
    }

    public function get_assets_vis_korasset(){
        $month = date('m');
        $year = date('Y');
        $plant = $this->input->post('plant');

        $this->load->library('datatables');
        $this->datatables->select('
            asset, 
            assets.sno as sno, 
            cost_center, 
            UPPER(asset_description),
            UPPER(h.name) as pemilik,
            UPPER(hierarchy.name) as name,
            opnames.created_at,
            opnames.asset_condition,
            UPPER(opnames.explanation) as explanation'
        );
        $this->datatables->from('assets');
        $this->datatables->join('(SELECT * FROM opnames WHERE id IN (SELECT MAX(id) FROM opnames GROUP BY asset_code)) opnames', 'assets.asset = opnames.asset_code', 'left');
        $this->datatables->join('users', 'users.nid = opnames.user_id', 'left');
        $this->datatables->join('working_history', 'working_history.user_id = users.id and working_history.is_active = 1', 'left');
        $this->datatables->join('hierarchy', 'hierarchy.id = working_history.hierarchy_id', 'left');
        $this->datatables->join('hierarchy h', 'h.id = assets.hierarchy', 'left');
        // $this->datatables->where('assets.hierarchy in (select descendant from hierarchy_closure where ancestor = '.user()->hierarchy_id.')');
        $this->datatables->where("(ifnull(month(opnames.created_at),0) != '{$month}' or ifnull(year(opnames.created_at),0) != '{$year}')");
      //  $this->datatables->where('h.name is not null');
        if (($plant == 2) or (user()->hierarchy_role == 2))
        {
            $this->datatables->where('(assets.busA = 12 or assets.busA = 20)');
        } else if (($plant == 3) or (user()->hierarchy_role == 3))
        {
            $this->datatables->where('(assets.busA = 5 or assets.busA = 9 or assets.busA = 22)');
        } else if (($plant == 4) or (user()->hierarchy_role == 4))
        {
            $this->datatables->where('(assets.busA = 2 or assets.busA = 23)');
        } else if (($plant == 5) or (user()->hierarchy_role == 5))
        {
            $this->datatables->where('(assets.busA = 1)');
        } else if (($plant == 6) or (user()->hierarchy_role == 6))
        {
            $this->datatables->where('(assets.busA = 13 or assets.busA = 14 or assets.busA = 19)');
        } else if (($plant == 7) or (user()->hierarchy_role == 7))
        {
            $this->datatables->where('(assets.busA = 10 or assets.busA = 15)');
        } else if (($plant == 8) or (user()->hierarchy_role == 8))
        {
            $this->datatables->where('(assets.busA = 16)');
        } else if (($plant == 9) or (user()->hierarchy_role == 9))
        {
            $this->datatables->where('(assets.busA = 11)');
        } else if (($plant == 10) or (user()->hierarchy_role == 10))
        {
            $this->datatables->where('(assets.busA = 4)');
        } else if (($plant == 11) or (user()->hierarchy_role == 11))
        {
            $this->datatables->where('(assets.busA = 3)');
        } else if (($plant == 12) or (user()->hierarchy_role == 12))
        {
            $this->datatables->where('(assets.busA = 14)');
        } else if (($plant == 13) or (user()->hierarchy_role == 13))
        {
            $this->datatables->where('(assets.busA = 13)');
        }   
        print_r($this->datatables->generate());
    }

    public function get_assets_inv_korasset(){
        $plant = $this->input->post('plant');
        $this->load->library('datatables');
        $this->datatables->select('
            invalids.id, 
            invalids.asset, 
            UPPER(invalids.asset_description), 
            UPPER(hierarchy.name), 
            UPPER(invalids.explanation), 
            UPPER(invalids.asset_condition), 
            invalids.created_at,
            "" as action'
        );
        $this->datatables->from('invalids');
        $this->datatables->join('hierarchy', 'hierarchy.id = invalids.user_id', 'left');
        $this->datatables->join('assets', 'assets.hierarchy = invalids.user_id', 'left');

        if (($plant == 2) or (user()->hierarchy_role == 2))
        {
            $this->datatables->where('invalids.user_id IN (SELECT descendant FROM hierarchy_closure WHERE ancestor = 153 OR ancestor = 109)');
        } else if (($plant == 3) or (user()->hierarchy_role == 3))
        {
            $this->datatables->where('invalids.user_id IN (SELECT descendant FROM hierarchy_closure WHERE ancestor = 1358  OR ancestor = 113 OR ancestor = 152 )');
        } else if (($plant == 4) or (user()->hierarchy_role == 4))
        {
            $this->datatables->where('invalids.user_id IN (SELECT descendant FROM hierarchy_closure WHERE ancestor = 5 OR ancestor = 728)');
        } else if (($plant == 5) or (user()->hierarchy_role == 5))
        {
            $this->datatables->where('invalids.user_id IN (SELECT descendant FROM hierarchy_closure WHERE ancestor = 107)');
        } else if (($plant == 6) or (user()->hierarchy_role == 6))
        {
            $this->datatables->where('invalids.user_id IN (SELECT descendant FROM hierarchy_closure WHERE ancestor = 108 OR ancestor = 41)');
        } else if (($plant == 7) or (user()->hierarchy_role == 7))
        {
            $this->datatables->where('invalids.user_id IN (SELECT descendant FROM hierarchy_closure WHERE ancestor = 2229 OR ancestor = 40)'); 
        } else if (($plant == 8) or (user()->hierarchy_role == 8))
        {
            $this->datatables->where('(assets.busA = 16)');
        } else if (($plant == 9) or (user()->hierarchy_role == 9)) 
        {
            $this->datatables->where('invalids.user_id IN (SELECT descendant FROM hierarchy_closure WHERE ancestor = 1942)');  
        } else if (($plant == 10) or (user()->hierarchy_role == 10))
        {
            $this->datatables->where('invalids.user_id IN (SELECT descendant FROM hierarchy_closure WHERE ancestor = 107)'); 
        } else if (($plant == 11) or (user()->hierarchy_role == 11))
        {
            $this->datatables->where('invalids.user_id IN (SELECT descendant FROM hierarchy_closure WHERE ancestor = 151)');  
        } else if (($plant == 12) or (user()->hierarchy_role == 12))
        {
            $this->datatables->where('invalids.user_id IN (SELECT descendant FROM hierarchy_closure WHERE ancestor = 108)');
        } else if (($plant == 13) or (user()->hierarchy_role == 13))
        {
            $this->datatables->where('invalids.user_id IN (SELECT descendant FROM hierarchy_closure WHERE ancestor = 41)');  
        }   
        
        $this->datatables->group_by('invalids.id');

     //   $this->datatables->where('user_id in (select descendant from hierarchy_closure where ancestor = '.user()->hierarchy_id.')');
        print_r($this->datatables->generate());
         // $this->datatables->generate();
         // print_r($this->db->last_query());
    }

    public function get_assets_his_korasset(){
        $month = date('m');
        $month = $month + 1;
        $year = date('Y');
        $plant = $this->input->post('plant');

        $this->load->library('datatables');
        $this->datatables->select('
            asset, 
            sno, 
            cost_center, 
            UPPER(asset_description), 
            UPPER(name),
            num,
            UPPER(month),
            years'
        );
        $this->datatables->from('(select CASE
                WHEN month = 1 THEN "Januari"
                WHEN month = 2 THEN "Februari"
                WHEN month = 3 THEN "Maret"
                WHEN month = 4 THEN "April"
                WHEN month = 5 THEN "Mei"
                WHEN month = 6 THEN "Juni"
                WHEN month = 7 THEN "Juli"
                WHEN month = 8 THEN "Agustus"
                WHEN month = 9 THEN "September"
                WHEN month = 10 THEN "Oktober"
                WHEN month = 11 THEN "November"
                ELSE "Desember"
            END as month,
            month as num,
            asset, 
            sno, 
            cap_date, 
            odep_start, 
            cost_center, 
            asset_description,
            hierarchy.name,
            funloc,
            no_equipment,
            qty, 
            bun,
            busA,
            years from assets_temp left join `hierarchy` on `hierarchy`.`id` = `assets_temp`.`hierarchy` WHERE CONCAT(asset,`month`,years) NOT IN
            (SELECT CONCAT(asset,`month`,years) FROM `assets` LEFT JOIN `opnames` ON `assets`.`asset` = `opnames`.`asset_code` LEFT JOIN `users` 
            ON `users`.`nid` = `opnames`.`user_id` LEFT JOIN `working_history` ON `working_history`.`user_id` = `users`.`id` and working_history.is_active = 1 LEFT JOIN `hierarchy` 
            ON `hierarchy`.`id` = `working_history`.`hierarchy_id` LEFT JOIN `hierarchy` `h` ON `h`.`id` = `assets`.`hierarchy` WHERE MONTH(opnames.created_at) <> "'.$month.'" OR YEAR(opnames.created_at) <> "'.$year.'") order by month desc) tbl1');
      //  $this->datatables->where('name is not null');
        if (($plant == 2) or (user()->hierarchy_role == 2))
        {
            $this->datatables->where('(busA = 12 or busA = 20)');
        } else if (($plant == 3) or (user()->hierarchy_role == 3))
        {
            $this->datatables->where('(busA = 5 or busA = 9 or busA = 22)');
        } else if (($plant == 4) or (user()->hierarchy_role == 4))
        {
            $this->datatables->where('(busA = 2 or busA = 23)');
        } else if (($plant == 5) or (user()->hierarchy_role == 5))
        {
            $this->datatables->where('(busA = 1)');
        } else if (($plant == 6) or (user()->hierarchy_role == 6))
        {
            $this->datatables->where('(busA = 13 or busA = 14 or busA = 19)');
        } else if (($plant == 7) or (user()->hierarchy_role == 7))
        {
            $this->datatables->where('(busA = 10 or busA = 15)');
        } else if (($plant == 8) or (user()->hierarchy_role == 8))
        {
            $this->datatables->where('(busA = 16)');
        } else if (($plant == 9) or (user()->hierarchy_role == 9))
        {
            $this->datatables->where('(busA = 11)');
        } else if (($plant == 10) or (user()->hierarchy_role == 10))
        {
            $this->datatables->where('(busA = 4)');
        } else if (($plant == 11) or (user()->hierarchy_role == 11))
        {
            $this->datatables->where('(busA = 3)');
        } else if (($plant == 12) or (user()->hierarchy_role == 12))
        {
            $this->datatables->where('(busA = 14)');
        } else if (($plant == 13) or (user()->hierarchy_role == 13))
        {
            $this->datatables->where('(busA = 13)');
        }   
        print_r($this->datatables->generate());
       // print_r($this->db->last_query());
    }


    public function get_assets_acc(){
        $month = date('m');
        $year = date('Y');

        $this->load->library('datatables');
        $this->datatables->select('
            asset as "NOMOR ASSET", 
            assets.sno as "SUB NUMBER", 
            cap_date as "CAP DATE", 
            odep_start as "ODEP START", 
            cost_center as "COST CENTER", 
            asset_description as "DESKRIPSI", 
            h.name as "PEMILIK ASSET",
            qty as "QTY", 
            bun as "BUN", 
            busA, 
            hierarchy.name,
            opnames.created_at,
            opnames.asset_condition,
            opnames.explanation'
        );
        $this->datatables->from('assets');
        $this->datatables->join('opnames', 'assets.asset = opnames.asset_code and assets.sno = opnames.sno', 'left');
        $this->datatables->join('hierarchy', 'hierarchy.id = opnames.user_id', 'left');
        $this->datatables->join('hierarchy h', 'h.id = assets.hierarchy', 'left');
        $this->datatables->where('month(opnames.created_at)', $month);
        $this->datatables->where('year(opnames.created_at)', $year);
        print_r($this->datatables->generate());
    }

    public function get_assets_vis_acc(){
        $month = date('m');
        $year = date('Y');

        $this->load->library('datatables');
        $this->datatables->select('
            asset as "NOMOR ASSET", 
            assets.sno as "SUB NUMBER", 
            cap_date as "CAP DATE", 
            odep_start as "ODEP START", 
            cost_center as "COST CENTER", 
            asset_description as "DESKRIPSI", 
            h.name as "PEMILIK ASSET",
            qty as "QTY", 
            bun as "BUN", 
            busA, 
            hierarchy.name,
            opnames.created_at,
            opnames.explanation'
        );
        $this->datatables->from('assets');
        $this->datatables->join('opnames', 'assets.asset = opnames.asset_code and assets.sno = opnames.sno', 'left');
        $this->datatables->join('hierarchy', 'hierarchy.id = opnames.user_id', 'left');
        $this->datatables->join('hierarchy h', 'h.id = assets.hierarchy', 'left');
        $this->datatables->where("(ifnull(month(opnames.created_at),0) != '{$month}' or ifnull(year(opnames.created_at),0) != '{$year}')");
        print_r($this->datatables->generate());
    }

    public function get_assets_inv_acc(){
        $this->load->library('datatables');
        $this->datatables->select('
            invalids.asset as "NOMOR ASSET", 
            invalids.asset_description as "DESKRIPSI ASSET", 
            hierarchy.name as "PEMILIK ASSET", 
            invalids.explanation as "PENJELASAN", 
            invalids.asset_condition as "KONDISI", 
            invalids.created_at as "TANGGAL OPNAME"'
        );
        $this->datatables->from('invalids');
        $this->datatables->join('hierarchy', 'hierarchy.id = invalids.user_id', 'left');
        print_r($this->datatables->generate());
    }

    public function import(){

        $file = $_FILES['imported_file']['tmp_name'];
        $delimiter = '^';
        $csv = array_map(function($d) use ($delimiter){
            return str_getcsv($d, $delimiter);
        }, file($file));
        
       // print_r($csv);

        array_walk($csv, function(&$a) use ($csv) {
            $assetid = $a[0];
            $a = array_combine($csv[0], $a);
            if($a['asset'] != 'asset'){
                $nomer = substr($a['asset'], -3);
                if($nomer == '.00'){
                    $a['asset'] = explode('.', $a['asset'])[0];
                }
                if($nomer == ',00'){
                    $a['asset'] = explode(',', $a['asset'])[0];
                }
            }
            if($a['cap_date'] != 'cap_date'){
                $a['cap_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $a['cap_date'])));
            }
            if($a['odep_start'] != 'odep_start'){
                $a['odep_start'] = date('Y-m-d', strtotime(str_replace('/', '-', $a['odep_start'])));
            }
            if($a['cum_acq_value'] != 'cum_acq_value'){
                $a['cum_acq_value'] = str_replace('.', '', $a['cum_acq_value']);
                if($a['cum_acq_value'] == '-'){
                    $a['cum_acq_value'] = 0;
                }else{
                    $a['cum_acq_value'] = $a['cum_acq_value'];
                }
            }
            if($a['accum_dep'] != 'accum_dep'){
                $a['accum_dep'] = str_replace('.', '', $a['accum_dep']);
                if($a['accum_dep'] == '-'){
                    $a['accum_dep'] = 0;
                }else{
                    $a['accum_dep'] = $a['accum_dep'];
                }
            }
            if($a['start_book_val'] != 'start_book_val'){
                $a['start_book_val'] = str_replace('.', '', $a['start_book_val']);
                if($a['start_book_val'] == '-'){
                    $a['start_book_val'] = 0;
                }else{
                    $a['start_book_val'] = $a['start_book_val'];
                }
            }
            if($a['trans_acq_value'] != 'trans_acq_value'){
                $a['trans_acq_value'] = str_replace('.', '', $a['trans_acq_value']);
                if($a['trans_acq_value'] == '-'){
                    $a['trans_acq_value'] = 0;
                }else{
                    $a['trans_acq_value'] = $a['trans_acq_value'];
                }
            }
            if($a['trans_acc_dep'] != 'trans_acc_dep'){
                $a['trans_acc_dep'] = str_replace('.', '', $a['trans_acc_dep']);

                if($a['trans_acc_dep'] == '-'){
                    $a['trans_acc_dep'] = 0;
                }else{
                    $a['trans_acc_dep'] = $a['trans_acc_dep'];
                }
            }  
            if($a['plnd_dep'] != 'plnd_dep'){
                $a['plnd_dep'] = str_replace('.', '', $a['plnd_dep']);
                if($a['plnd_dep'] == '-'){
                    $a['plnd_dep'] = 0;
                }else{
                    $a['plnd_dep'] = $a['plnd_dep'];
                }
            }
            if($a['end_book_val'] != 'end_book_val'){
                $a['end_book_val'] = str_replace('.', '', $a['end_book_val']);
                if($a['end_book_val'] == '-'){
                    $a['end_book_val'] = 0;
                }else{
                    $a['end_book_val'] = $a['end_book_val'];
                }
            }
        });

        array_shift($csv);
      //  $this->db->truncate('assets');
        $this->db->insert_on_duplicate_update_batch('assets', $csv);
        return redirect(base_url('asset/uploadAsset'));

    }

    function Hasil($excel = 0){
        
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalawal = date('Y-m-d',strtotime($tanggalawal));
        $tanggalakhir = $this->input->post('tanggalakhir');
        $tanggalakhir = date('Y-m-d',strtotime($tanggalakhir));

        $this->load->model('asset_model');
        $assets = $this->asset_model->hasil($tanggalawal,$tanggalakhir);

        $data['tanggalawal'] = $tanggalawal;
        $data['tanggalakhir'] = $tanggalakhir;

        $data = [
            'title'         => 'Assets',
            'hasil'      => $assets,
            'tanggalawal' => $this->input->post('tanggalawal'),
            'tanggalakhir' => $this->input->post('tanggalakhir'),
            'content'       => 'asset/hasil',
            'vendor_js'     => array(
                '/assets/js/asset.js'
            ),
        ];

        if ($excel == 2) {
            header("Content-type: application/vnd-ms-excel");
            header("Content-Disposition: attachment; filename=report.xls");
            $this->load->view('asset/hasil',$data); 
        } else{
            return $this->load->view('component/template', $data);
        } 

    }


    function getHasil($excel = 0){
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalawal = date('Y-m-d',strtotime($tanggalawal));
        $tanggalakhir = $this->input->post('tanggalakhir');
        $tanggalakhir = date('Y-m-d',strtotime($tanggalakhir));


        $data['hasil'] = $this->M_codeigniter->query("
              select * from 
              (SELECT sj.nomorsj as `NOMOr SURAT JALAN`,IFNULL( d.`nama_mdriver`,sj.sopir) AS `NAMA DRIVER`,CASE WHEN sj.size = 0 THEN 'KECIL' ELSE 'BESAR' END AS `JENIS KENDARAAN`,
              k.`nopol` AS NOPOL,j.nama_jenis AS `NAMA KENDARAAN`,sj.tanggalberangkat as `TANGGAL RENCANA KEBRKT`, pk.tglberangkat AS `TANGGAL BRKT REAL`, 
              pk.jamkeluar AS `JAM BRKT REAL`, pk.tgltiba AS `TANGGAL TIBA REAL`, pk.jammasuk AS `JAM TIBA REAL`,sj.asalsj AS `DARI REAL`,
              p.`nama_mpelabuhan` AS `TUJUAN REAL`,pk.jenismuatan AS `JENIS MUATAN`,pk.kmawal AS `KILOMETER AWAL`,pk.kmakhir AS `KILOMETER AKHIR`  
              FROM tbl_suratjalan sj 
              JOIN tbl_master_pelabuhan p ON p.`id_mpelabuhan` = sj.`tujuan`
              LEFT JOIN tbl_master_kendaraan k ON sj.kendaraan = k.id 
              LEFT JOIN tbl_master_jenis j ON k.jenis = j.id
              LEFT JOIN tbl_master_driver d ON d.`id_mdriver` = sj.`sopir`
              LEFT JOIN tbl_master_chasis s ON s.id = sj.sasis
              LEFT JOIN tbl_p_kendaraan pk ON pk.fk_idsj = sj.nomorsj
              WHERE sj.tanggalberangkat > '".$tanggalawal."' and sj.tanggalberangkat < '".$tanggalakhir."'   
              UNION
              SELECT sj.nomorsj as `NOMOr SURAT JALAN`,IFNULL( d.`nama_mdriver`,sj.sopir) AS `NAMA DRIVER`,CASE WHEN sj.size = 0 THEN 'KECIL' ELSE 'BESAR' END AS `JENIS KENDARAAN`,
              k.`nopol` AS NOPOL,j.nama_jenis AS `NAMA KENDARAAN`,sj.tanggalberangkat as `TANGGAL RENCANA KEBRKT`, pk.tglberangkat AS `TANGGAL BRKT REAL`, 
              pk.jamkeluar AS `JAM BRKT REAL`, pk.tgltiba AS `TANGGAL TIBA REAL`, pk.jammasuk AS `JAM TIBA REAL`,sj.asalsj AS `DARI REAL`,
              p.`nama_mdepo` AS `TUJUAN REAL`,pk.jenismuatan AS `JENIS MUATAN`,pk.kmawal AS `KILOMETER AWAL`,pk.kmakhir AS `KILOMETER AKHIR`  
              FROM tbl_suratjalan sj 
              JOIN tbl_master_depo p ON p.`id_mdepo` = sj.`tujuan`
              LEFT JOIN tbl_master_kendaraan k ON sj.kendaraan = k.id 
              LEFT JOIN tbl_master_jenis j ON k.jenis = j.id
              LEFT JOIN tbl_master_driver d ON d.`id_mdriver` = sj.`sopir`
              LEFT JOIN tbl_master_chasis s ON s.id = sj.sasis
              LEFT JOIN tbl_p_kendaraan pk ON pk.fk_idsj = sj.nomorsj
              WHERE sj.tanggalberangkat > '".$tanggalawal."' and sj.tanggalberangkat < '".$tanggalakhir."'    
              UNION
              SELECT sj.nomorsj as `NOMOr SURAT JALAN`,IFNULL( d.`nama_mdriver`,sj.sopir) AS `NAMA DRIVER`,CASE WHEN sj.size = 0 THEN 'KECIL' ELSE 'BESAR' END AS `JENIS KENDARAAN`,
              k.`nopol` AS NOPOL,j.nama_jenis AS `NAMA KENDARAAN`,sj.tanggalberangkat as `TANGGAL RENCANA KEBRKT`, pk.tglberangkat AS `TANGGAL BRKT REAL`, 
              pk.jamkeluar AS `JAM BRKT REAL`, pk.tgltiba AS `TANGGAL TIBA REAL`, pk.jammasuk AS `JAM TIBA REAL`,sj.asalsj AS `DARI REAL`,
              p.`nama_mplant` AS `TUJUAN REAL`,pk.jenismuatan AS `JENIS MUATAN`,pk.kmawal AS `KILOMETER AWAL`,pk.kmakhir AS `KILOMETER AKHIR`
              FROM tbl_suratjalan sj 
              JOIN tbl_master_plant p ON p.`id_mplant` = sj.`tujuan`
              LEFT JOIN tbl_master_kendaraan k ON sj.kendaraan = k.id 
              LEFT JOIN tbl_master_jenis j ON k.jenis = j.id
              LEFT JOIN tbl_master_driver d ON d.`id_mdriver` = sj.`sopir`
              LEFT JOIN tbl_master_chasis s ON s.id = sj.sasis
              LEFT JOIN tbl_p_kendaraan pk ON pk.fk_idsj = sj.nomorsj
              WHERE sj.tanggalberangkat > '".$tanggalawal."' and sj.tanggalberangkat < '".$tanggalakhir."'    
              UNION
              SELECT sj.nomorsj as `NOMOr SURAT JALAN`,IFNULL( d.`nama_mdriver`,sj.sopir) AS `NAMA DRIVER`,CASE WHEN sj.size = 0 THEN 'KECIL' ELSE 'BESAR' END AS `JENIS KENDARAAN`,
              k.`nopol` AS NOPOL,j.nama_jenis AS `NAMA KENDARAAN`,sj.tanggalberangkat as `TANGGAL RENCANA KEBRKT`, pk.tglberangkat AS `TANGGAL BRKT REAL`, 
              pk.jamkeluar AS `JAM BRKT REAL`, pk.tgltiba AS `TANGGAL TIBA REAL`, pk.jammasuk AS `JAM TIBA REAL`,sj.asalsj AS `DARI REAL`,
              sj.`tujuan` AS `TUJUAN REAL`,pk.jenismuatan AS `JENIS MUATAN`,pk.kmawal AS `KILOMETER AWAL`,pk.kmakhir AS `KILOMETER AKHIR`
              FROM tbl_suratjalan sj 
              LEFT JOIN tbl_master_kendaraan k ON sj.kendaraan = k.id 
              LEFT JOIN tbl_master_jenis j ON k.jenis = j.id
              LEFT JOIN tbl_master_driver d ON d.`id_mdriver` = sj.`sopir`
              LEFT JOIN tbl_master_chasis s ON s.id = sj.sasis
              LEFT JOIN tbl_p_kendaraan pk ON pk.fk_idsj = sj.nomorsj
              WHERE (sj.tanggalberangkat > '".$tanggalawal."' and sj.tanggalberangkat < '".$tanggalakhir."') AND sj.`jns_tujuan` = 0) as tbl1
              ORDER BY tbl1.`NOMOr SURAT JALAN` ASC
        ")->result();           
        
    //  echo $this->db->last_query();

    
        $data['tanggalawal'] = $tanggalawal;
        $data['tanggalakhir'] = $tanggalakhir;

        if ($excel == 1) {
            $this->load->library('pdf');
            $this->data['title_pdf'] = 'Laporan Surat Jalan';
            $file_pdf = 'laporan_surat_jalan';
            $paper = 'Legal';
          // $paper = 'A4';
            $orientation = "landscape";
            $html = $this->load->view('list_hasil',$data, true);       
            $this->pdf->generate($html, $file_pdf,$paper,$orientation);
        } else if ($excel == 2) {
            header("Content-type: application/vnd-ms-excel");
            header("Content-Disposition: attachment; filename=report.xls");
            $this->load->view('list_hasil',$data); 
        } else{
            $output = array(
                'html' => $this->load->view('list_hasil',$data, true)
            );
            echo json_encode($output);
        }   
    }
    
}
