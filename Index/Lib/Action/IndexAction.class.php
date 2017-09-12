<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
//       $db = M('user');
//        $result = $db->select();
//        dump($result);
//        echo C('username');
//        test();
//        p(I('uid'));die;
        //先获取变量数据，再显示页面，从而带着数据去
        $this->assign('wish',M('wish')->select())->display();
    }
    public function handle(){
        //先判断是否post提交过来，是才正确运行，否则返回404页面即可
        if(!IS_POST){
            _404('不能直接访问表单处理函数',U('index'));
        }else{
            $data = array(
                'username' => I('username','',htmlspecialchars()),
                'content' => I('content','',htmlspecialchars()),
                'time' => time()
            );
            //thinkphp删除数据，要加where语句 where(array('id' => array('gt',0))
//            $result  = M('wish')->where('id > 0')->delete();

           if(M('wish')->data($data)->add()){
               $this->success('发布成功','index');
           }else{
               $this->error('发布失败，请重试');
           }

        }


    }
}