<?php 

class Asset_model extends CI_Model{

    protected $table = 'assets';
    protected $table2 = 'invalids';

    /**
     * Get all asset
     * @return
     */
    public function get_all(){
        return $this->db->get($this->table)->result();
    }

    public function get_asset()
    {
        return $this->db->query("
        SELECT * 
        FROM " . $this->table . " 
        WHERE hierarchy = '".user()->hierarchy_id."'
        ")->result();
    }

    public function get_one_all(){
        $this->db->select("
                {$this->table}.asset as 'NOMOR_ASSET',
                {$this->table}.sno as 'SUB_NUMBER',
                {$this->table}.cap_date as 'CAP_DATE',
                {$this->table}.odep_start as 'ODEP_START',
                {$this->table}.cost_center as 'COST_CENTER',
                {$this->table}.asset_description as 'DESKRIPSI',
                {$this->table}.funloc as 'FUNCTIONAL_LOCATION',
                {$this->table}.no_equipment as 'NOMOR_EQUIPMENT',
                {$this->table}.qty as 'QTY',
                {$this->table}.bun as 'BUN',
                {$this->table}.busA as 'BUSINESS_AREA',
                h.name as 'PEMILIK_ASSET',
                h.name as 'STATUS'
            ");
        
        $this->db->from("$this->table");
        $this->db->join('opnames', "opnames.asset_code = {$this->table}.asset AND opnames.sno = {$this->table}.sno", 'left');
        $this->db->join('hierarchy', 'hierarchy.id = opnames.user_id', 'left');
        $this->db->join('hierarchy h', "h.id = {$this->table}.hierarchy", 'left');
        $this->db->limit(1);
        $asset = $this->db->get()->result_array();
        return $asset;
    }

    public function dispose_asset($asset,$sno,$keterangan){
        $this->db->where('asset', $asset);
        $this->db->where('sno', $sno);
        return $this->db->update($this->table, array('dispose' => 1, 'dispose_description' => $keterangan));
    }

    public function get_one(){
        $this->db->select("
                {$this->table}.asset as 'NOMOR_ASSET',
                {$this->table}.sno as 'SUB_NUMBER',
                {$this->table}.cost_center as 'COST_CENTER',
                {$this->table}.asset_description as 'DESKRIPSI',
                h.name as 'PEMILIK_ASSET',
                hierarchy.name as 'USER_OPNAME',
                opnames.created_at as 'TANGGAL_OPNAME',
                opnames.asset_condition as 'KONDISI_ASSET',
                opnames.explanation as 'KETERANGAN'
            ");
        
        $this->db->from("$this->table");
        $this->db->join('opnames', "opnames.asset_code = {$this->table}.asset AND opnames.sno = {$this->table}.sno", 'left');
        $this->db->join('hierarchy', 'hierarchy.id = opnames.user_id', 'left');
        $this->db->join('hierarchy h', "h.id = {$this->table}.hierarchy", 'left');
        $this->db->limit(1);
        $asset = $this->db->get()->result_array();
        return $asset;
    }

    public function get_one2(){
        $this->db->select("
                {$this->table}.asset as 'NOMOR_ASSET',
                {$this->table}.sno as 'SUB_NUMBER',
                {$this->table}.cost_center as 'COST_CENTER',
                {$this->table}.asset_description as 'DESKRIPSI',
                h.name as 'PEMILIK_ASSET'
            ");
        
        $this->db->from("$this->table");
        $this->db->join('opnames', "opnames.asset_code = {$this->table}.asset AND opnames.sno = {$this->table}.sno", 'left');
        $this->db->join('hierarchy', 'hierarchy.id = opnames.user_id', 'left');
        $this->db->join('hierarchy h', "h.id = {$this->table}.hierarchy", 'left');
        $this->db->limit(1);
        $asset = $this->db->get()->result_array();
        return $asset;
    }


    public function asset_by_hierarchy($id_hierarchy){
        $query = "
            SELECT 
            assets.id as 'ID',
            assets.asset as 'NOMOR_ASSET',
            assets.sno as 'SUB_NUMBER',
            assets.cap_date as 'CAP_DATE',
            assets.cost_center as 'COST_CENTER',
            assets.asset_description as 'DESKRIPSI',
            assets.qty as 'QTY'
            FROM assets  where hierarchy in (select descendant from hierarchy_closure where ancestor = '".$id_hierarchy."')
        ";
        return $this->db->query($query)->result();
    }

    public function get_asset_chart(){
        $query = "
            SELECT plant,COUNT(*) AS jmla,(SELECT jml FROM                
(SELECT plant,COUNT(*) AS jml FROM
            (SELECT CASE 
                WHEN (busA = 12 OR busA = 20) THEN 'MEDAN'  
                WHEN (busA = 5 OR busA = 9 OR busA = 22) THEN 'LAMPUNG'
                WHEN (busA = 2 OR busA = 23) THEN 'DAMPIT'
                WHEN (busA = 1 OR busA = 3 OR busA = 4 OR busA = 21) THEN 'SURABAYA'
                WHEN (busA = 13 OR busA = 14 OR busA = 19) THEN 'MAKASSAR'
                WHEN (busA = 10 OR busA = 15) THEN 'LAMONGAN'
                WHEN (busA = 16) THEN 'JAKARTA'
                WHEN (busA = 11) THEN 'CIREBON'
                ELSE '' END AS plant FROM assets WHERE hierarchy IS NOT NULL AND hierarchy <> 0) AS t WHERE PLANT <> '' GROUP BY plant) t1 WHERE t1.plant = t.plant ) AS jmlb,(SELECT jml FROM                
(SELECT plant,COUNT(*) AS jml FROM
            (SELECT CASE 
                WHEN (busA = 12 OR busA = 20) THEN 'MEDAN'  
                WHEN (busA = 5 OR busA = 9 OR busA = 22) THEN 'LAMPUNG'
                WHEN (busA = 2 OR busA = 23) THEN 'DAMPIT'
                WHEN (busA = 1 OR busA = 3 OR busA = 4 OR busA = 21) THEN 'SURABAYA'
                WHEN (busA = 13 OR busA = 14 OR busA = 19) THEN 'MAKASSAR'
                WHEN (busA = 10 OR busA = 15) THEN 'LAMONGAN'
                WHEN (busA = 16) THEN 'JAKARTA'
                WHEN (busA = 11) THEN 'CIREBON'
                ELSE '' END AS plant FROM assets WHERE hierarchy IS NULL OR hierarchy = 0) AS t WHERE PLANT <> '' GROUP BY plant) t1 WHERE t1.plant = t.plant ) AS jmlc FROM
            (SELECT CASE 
                WHEN (busA = 12 OR busA = 20) THEN 'MEDAN'  
                WHEN (busA = 5 OR busA = 9 OR busA = 22) THEN 'LAMPUNG'
                WHEN (busA = 2 OR busA = 23) THEN 'DAMPIT'
                WHEN (busA = 1 OR busA = 3 OR busA = 4 OR busA = 21) THEN 'SURABAYA'
                WHEN (busA = 13 OR busA = 14 OR busA = 19) THEN 'MAKASSAR'
                WHEN (busA = 10 OR busA = 15) THEN 'LAMONGAN'
                WHEN (busA = 16) THEN 'JAKARTA'
                WHEN (busA = 11) THEN 'CIREBON'
                ELSE '' END AS plant FROM assets) AS t WHERE PLANT <> '' GROUP BY plant
        ";
        return $this->db->query($query)->result();
    }

    public function get_asset_opname(){
        $query = "
            SELECT plant as label,COUNT(*) AS value FROM
            (SELECT CASE 
                WHEN (a.busA = 12 OR a.busA = 20) THEN 'MEDAN'  
                WHEN (a.busA = 5 OR a.busA = 9 OR a.busA = 22) THEN 'LAMPUNG'
                WHEN (a.busA = 2 OR a.busA = 23) THEN 'DAMPIT'
                WHEN (a.busA = 1 OR a.busA = 3 OR a.busA = 4 OR a.busA = 21) THEN 'SURABAYA'
                WHEN (a.busA = 13 OR a.busA = 14 OR a.busA = 19) THEN 'MAKASSAR'
                WHEN (a.busA = 10 OR a.busA = 15) THEN 'LAMONGAN'
                WHEN (a.busA = 16) THEN 'JAKARTA'
                WHEN (a.busA = 11) THEN 'CIREBON'
                ELSE '' END AS plant FROM assets a LEFT JOIN opnames o ON a.asset = o.asset_code AND a.sno = o.sno
            WHERE o.`asset_code` IS NOT NULL) AS t WHERE PLANT <> '' GROUP BY plant
        ";
        return $this->db->query($query)->result();
    }

    public function get_asset_blmopname(){
        $query = "
            SELECT plant as label,COUNT(*) AS value FROM
            (SELECT CASE 
                WHEN (a.busA = 12 OR a.busA = 20) THEN 'MEDAN'  
                WHEN (a.busA = 5 OR a.busA = 9 OR a.busA = 22) THEN 'LAMPUNG'
                WHEN (a.busA = 2 OR a.busA = 23) THEN 'DAMPIT'
                WHEN (a.busA = 1 OR a.busA = 3 OR a.busA = 4 OR a.busA = 21) THEN 'SURABAYA'
                WHEN (a.busA = 13 OR a.busA = 14 OR a.busA = 19) THEN 'MAKASSAR'
                WHEN (a.busA = 10 OR a.busA = 15) THEN 'LAMONGAN'
                WHEN (a.busA = 16) THEN 'JAKARTA'
                WHEN (a.busA = 11) THEN 'CIREBON'
                ELSE '' END AS plant FROM assets a LEFT JOIN opnames o ON a.asset = o.asset_code AND a.sno = o.sno
            WHERE o.`asset_code` IS NULL) AS t WHERE PLANT <> '' GROUP BY plant
        ";
        return $this->db->query($query)->result();
    }

    public function get_inv_by_id($id){
        $invalid = $this->db->get_where($this->table2, array('id' => $id));
        if($invalid->num_rows() <= 0){
            return false;
        }

        return $invalid->result_array()[0];
    }

    public function get_one_inv(){
        $this->db->select("
                invalids.id as 'ID',
                invalids.asset as 'NOMOR_ASSET', 
                invalids.asset_description as 'DESKRIPSI_ASSET', 
                hierarchy.name as 'PEMILIK_ASSET', 
                invalids.explanation as 'KETERANGAN', 
                invalids.asset_condition as 'KONDISI', 
                invalids.created_at as 'TANGGAL_OPNAME',
                '' as 'ACTION'
        ");
        
        $this->db->from("invalids");
        $this->db->join('hierarchy', 'hierarchy.id = invalids.user_id', 'left');
        $this->db->limit(1);
        $asset = $this->db->get()->result_array();
        return $asset;
    }


    public function get_one_his(){
        $this->db->select("
            asset as 'NOMOR_ASSET', 
            sno as 'SUB_NUMBER', 
            cost_center as 'COST_CENTER', 
            asset_description as 'DESKRIPSI_ASSET', 
            h.name as 'PEMILIK_ASSET',
            month as '-',
            month as 'BULAN',
            years as 'TAHUN'
        ");
        
        $this->db->from("assets_temp");
        $this->db->join('hierarchy h', 'h.id = assets_temp.hierarchy', 'left');
        $this->db->limit(1);
        $asset = $this->db->get()->result_array();
        return $asset;
    }

    public function hasil($tanggalawal,$tanggalakhir){

        if (user()->hierarchy_role == 2)
        {
            $var = 'a.busA = 12 or a.busA = 20';
        } else if (user()->hierarchy_role == 3)
        {
            $var = 'a.busA = 5 or a.busA = 9 or a.busA = 22';
        } else if (user()->hierarchy_role == 4)
        {
            $var = 'a.busA = 2 or a.busA = 23';
        } else if (user()->hierarchy_role == 5)
        {
            $var = 'a.busA = 1';
        } else if (user()->hierarchy_role == 6)
        {
            $var = 'a.busA = 13 or a.busA = 14 or a.busA = 19';
        } else if (user()->hierarchy_role == 7)
        {
            $var = 'a.busA = 10 or a.busA = 15';
        } else if (user()->hierarchy_role == 8)
        {
            $var = 'a.busA = 16';
        } else if (user()->hierarchy_role == 9)
        {
            $var = 'a.busA = 11';
        } else if (user()->hierarchy_role == 10)
        {
            $var = 'a.busA = 4';
        } else if (user()->hierarchy_role == 11)
        {
            $var = 'a.busA = 3';
        } else if (user()->hierarchy_role == 12)
        {
            $var = 'a.busA = 14';
        } else if (user()->hierarchy_role == 13)
        {
            $var = 'a.busA = 13';
        } else
        {
            $var = 'a.busA = 12 or a.busA = 20 or a.busA = 5 or a.busA = 9 or a.busA = 22 or a.busA = 2 or a.busA = 23 or a.busA = 1 or a.busA = 13 or a.busA = 14 or a.busA = 19 or a.busA = 10 or a.busA = 15 or a.busA = 16 or a.busA = 11 or a.busA = 4 or a.busA = 3';
        }  

        $query = "            
                SELECT tbb2.name as departementbagian,tbb2.fullname as penanggungjawab,tbb2.jumlahasset as jumlahasset,
                tbb2.nonket,tbb2.bagus,tbb2.rusak,tbb1.useropname,tbb1.jumlah FROM
                (SELECT ifnull(tb3.name,'') as `name`,ifnull(tb3.`fullname`,'') as fullname,SUM(tb3.jumlah) AS jumlahasset,SUM(CASE WHEN tb3.asset_condition = '' THEN tb3.jumlah ELSE 0 END) AS nonket,
                SUM(CASE WHEN tb3.asset_condition = 'BAGUS' THEN tb3.jumlah ELSE 0 END) AS bagus,
                SUM(CASE WHEN tb3.asset_condition = 'RUSAK' THEN tb3.jumlah ELSE 0 END) AS rusak 
                FROM
                (
                    SELECT a.name,a.`fullname`, tb2.asset_condition,COUNT(*) jumlah
                    FROM (SELECT a.asset,a.busA,h.name,GROUP_CONCAT(u.`fullname`) AS fullname FROM 
                    assets a LEFT JOIN  hierarchy h ON h.id = a.`hierarchy`
                    LEFT JOIN working_history w ON w.`hierarchy_id` = a.`hierarchy` AND w.`is_active` = 1   
                    LEFT JOIN users u ON u.id = w.user_id 
                    WHERE ".$var." 
                    GROUP BY a.asset,a.busA,h.name) AS a 
                    LEFT JOIN (SELECT * FROM opnames WHERE CONCAT(asset_code,created_at) IN 
                    (SELECT CONCAT(asset_code,MAX(created_at)) FROM opnames WHERE DATE(created_at) >= '".$tanggalawal."' AND DATE(created_at) <= '".$tanggalakhir."' GROUP BY  asset_code)) AS tb2 ON tb2.asset_code = a.asset
                    WHERE ".$var." 
                    GROUP BY a.name,tb2.asset_condition) AS tb3
                GROUP BY tb3.name) AS tbb2
                LEFT JOIN 
                (
                    SELECT IFNULL(h.name,'') AS `name`,op.name AS useropname, COUNT(*) AS jumlah
                    FROM assets a 
                    LEFT JOIN hierarchy h ON h.id = a.`hierarchy`
                    LEFT JOIN (SELECT * FROM working_history WHERE is_active = 1 GROUP BY hierarchy_id) w ON w.`hierarchy_id` = a.`hierarchy`
                    LEFT JOIN users u ON u.id = w.user_id 
                    JOIN 
                    (SELECT o.asset_code,h.name AS `name`,o.asset_condition AS asset_conditon,o.created_at AS created_at FROM 
                    (SELECT * FROM opnames WHERE CONCAT(asset_code,created_at) IN 
                    (SELECT CONCAT(asset_code,MAX(created_at)) FROM opnames  GROUP BY  asset_code)) AS o JOIN users u ON u.nid = o.user_id
                    JOIN working_history w ON w.user_id = u.id AND w.is_active = 1
                    JOIN hierarchy h ON h.id = w.hierarchy_id WHERE DATE(o.`created_at`) >= '".$tanggalawal."' AND DATE(o.`created_at`) <= '".$tanggalakhir."') AS op ON op.asset_code = a.asset
                    WHERE ".$var." 
                    GROUP BY h.name,op.name) AS tbb1 ON tbb1.name = tbb2.name
                ORDER BY tbb2.name DESC";
        
        return $this->db->query($query)->result();
     //  $this->db->query($query)->result();             
      // echo $this->db->last_query();
    }

    public function get_by_asset_with_sn($asset_code,$sn){
            $this->db->select("
                {$this->table}.id as 'ID',
                {$this->table}.asset as 'NOMOR_ASSET',
                {$this->table}.sno as 'SUB_NUMBER',
                {$this->table}.cap_date as 'CAP_DATE',
                {$this->table}.odep_start as 'ODEP_START',
                {$this->table}.cost_center as 'COST_CENTER',
                {$this->table}.asset_description as 'DESKRIPSI',
                {$this->table}.qty as 'QTY',
                {$this->table}.bun as 'BUN',
                {$this->table}.busA as 'BUSINESS_AREA',
                opnames.user_id as 'USER_OPNAME',
                opnames.created_at as 'TANGGAL_OPNAME',
                opnames.explanation as 'KETERANGAN'
            ");
      //  $this->db->from("$this->table");
        $this->db->join('opnames', "opnames.asset_code = {$this->table}.asset AND opnames.sno = {$this->table}.sno", 'left');

        $asset = $this->db->get_where($this->table, array(
            'assets.asset' => $asset_code,
            'assets.sno' => $sn
        ))->result_array();
        if(!$asset){
            return false;
        }

        return $asset[0];
    }

}