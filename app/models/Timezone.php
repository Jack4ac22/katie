<?php
class Timezone
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    /**
     * @return all the timezones with the country name
     */
    public function get_timezones_data()
    {
        $this->db->query("SELECT C.alpha_3_code ,C.en_short_name, C.nationality, TZ.* FROM timezones AS TZ
        LEFT JOIN countries AS C ON TZ.country_code = C.alpha_2_code");
        $timezones = $this->db->resultSet();

        $this->db->query("SELECT PT.*, P.first_name, P.last_name, P.sex, P.img, C.en_short_name, C.nationality,T.timezone, T.gmt_offset, T.dst_offset, T.raw_offset, T.w_dts, T.s_dts  FROM people_timezones AS PT
        INNER JOIN people AS P ON P.id = PT.p_id
        INNER JOIN timezones AS T ON T.id = PT.t_id
        INNER JOIN countries AS C ON C.alpha_2_code = T.country_code");
        $list = $this->db->resultSet();
        $results = [
            'timezones' => $timezones,
            'list' => $list
        ];

        return $results;
    }


    /**
     * @return all the timezones with the country name
     */
    public function get_timezones()
    {
        $this->db->query("SELECT C.alpha_3_code ,C.en_short_name, C.nationality, TZ.* FROM timezones AS TZ
        LEFT JOIN countries AS C ON TZ.country_code = C.alpha_2_code");
        $timezones = $this->db->resultSet();
        return $timezones;
    }

    /**
     * get_timezone_dates($id)
     */

    public function get_timezone_dates($id)
    {
        $this->db->query("SELECT TZ.id, TZ.w_dts, TZ.s_dts FROM timezones AS TZ
        WHERE TZ.id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function get_timezone_by_id($id)
    {
        $this->db->query("SELECT * FROM timezones AS T
        INNER JOIN country_informations AS CI
        ON T.country_code = CI.alpha_2_code
        WHERE T.id = :id");
        $this->db->bind('id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function update_timezone_dates($data)
    {
        $this->db->query("UPDATE timezones SET w_dts = :w_dts , s_dts = :s_dts WHERE timezones.id = :id ;");
        $this->db->bind('w_dts', $data['w_dts']);
        $this->db->bind('s_dts', $data['s_dts']);
        $this->db->bind('id', $data['id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
