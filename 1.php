 public function actionYong()
    {
         $arr   = array(
            array
            (
                'id'       => 1,
                'pid'      => 0,
                'catename' => '电器',
            ),
            array
            (
                'id'       => 2,
                'pid'      => 0,
                'catename' => '服装',
            ),
            array
            (
                'id'       => 3,
                'pid'      => 0,
                'catename' => '',
            ),
            array
            (
                'id'       => 5,
                'pid'      => 0,
                'catename' => '',
            )
        );
         foreach ($arr as $k => &$v) {
              if ($v['catename']=='') {
                //删除空的地方
                 // unset($v['catename']);
                //删除空的的数组
                unset($arr[$k]);
              }
          // $res[] = $v;
         }
        echo "<pre>";
       print_r($arr);

    }
