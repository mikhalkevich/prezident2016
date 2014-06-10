<?php

class BaseController extends Controller {

    protected $a;
    protected $golos;
    protected $main;
    public $id_max;


    public function actionIndex() {
        $sql1 = "select *
                        from
                        (
                        select a.candidat_id, za, protive
                        from (
                        SELECT `candidat_id`, case when COUNT(`protiv_za`) is null then 0 else count(`protiv_za`) end za
                        FROM VOTES
                        WHERE `protiv_za` = 'za'
                        GROUP BY `candidat_id`) a left outer join
                        (
                        SELECT `candidat_id`, case when COUNT(`protiv_za`) is null then 0 else count(`protiv_za`) end protive
                        FROM VOTES
                        WHERE `protiv_za` = 'protiv'
                        GROUP BY `candidat_id`) b on a.candidat_id = b.candidat_id
                        union 
                        select a.candidat_id, za, protive
                        from (
                        SELECT `candidat_id`, case when COUNT(`protiv_za`) is null then 0 else count(`protiv_za`) end za
                        FROM VOTES
                        WHERE `protiv_za` = 'za'
                        GROUP BY `candidat_id`) a right outer join
                        (
                        SELECT `candidat_id`, case when COUNT(`protiv_za`) is null then 0 else count(`protiv_za`) end protive
                        FROM VOTES
                        WHERE `protiv_za` = 'protiv'
                        GROUP BY `candidat_id`) b on a.candidat_id = b.candidat_id) c
                        order by c.za desc, c.protive asc limit 1";
        
        $res = Votes::model()->findBySql($sql1);
        $id = Candidats::model()->findBySql("SELECT * FROM candidats where id = $res->candidat_id");
        $votes=Controller::votes($res->candidat_id);
        $result = $this->renderPartial('_index',$votes, true);
        $this->render('index', array('r' => $result, 'golos' => $this->golos,'votes'=>$votes, 'main' => $id));
    }

    public function actionPage($alias, $id) {
            $id_cand = Candidats::model()->findByPk($id);
            $model = new Votes();
            $this->a = Votes::model()->find('ip = :ip AND candidat_id= :id', array(
							':ip' => $_SERVER['REMOTE_ADDR'],
							':id' => $id
							));//проверяем голосовал ли пользователь раньше.
            if (!$this->a->id) {
                $model->candidat_id = $id_cand->id;
                $model->ip = $_SERVER['REMOTE_ADDR'];
                $model->protiv_za = $alias;
                $model->save();
                if ($alias == 'za') {
                    $id_cand->raiting++;
                } else {
                    $id_cand->raiting--;
                }
            } else {
                    $a = Votes::model()->updateAll(array('protiv_za' => $alias), 'id = :id AND ip = :ip', array(':id' => $this->a->id, ':ip' => $_SERVER['REMOTE_ADDR'])); 
            }
            $id_cand->save();
            Controller::redirect($_SERVER['HTTP_REFERER'].'#'. $this->a->candidat_id);
        }
    }