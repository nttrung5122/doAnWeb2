<?php

include '../model/questionModel.php';
include '../View/questionView.php';

class QuestionController {

    public static function renderBankQuestion(){
        $data=QuestionModel::getAllQuesstion();
        $result['question']=QuestionView::renderBankQuestion($data);
        $data=QuestionModel::getAllGroupQuestions();
        $result['groupQuestion']=QuestionView::renderQuestionGroup($data);
        return $result;
    }

    public static function renderSltQuestionGroup(){
        $data=QuestionModel::getAllGroupQuestions();
        $result=QuestionView::renderSltQuestionGroup($data);
        return $result;
    }

    public static function createQuestion($noidung,$cauA,$cauB,$cauC,$cauD,$idGroup,$tenNhom,$dapAn){
        if($idGroup=='newGroup'){
            $idGroup=QuestionModel::createQuestionGroup($tenNhom);
        }
        $idQuestion=QuestionModel::createQuestion($noidung,$idGroup,$dapAn);
        QuestionModel::createAnswer($idQuestion,'a',$cauA,'a'==$dapAn);
        QuestionModel::createAnswer($idQuestion,'b',$cauB,'b'==$dapAn);
        QuestionModel::createAnswer($idQuestion,'c',$cauC,'c'==$dapAn);
        QuestionModel::createAnswer($idQuestion,'d',$cauD,'d'==$dapAn);
        $data['status']="success";
        $data['notice']="Tạo câu hỏi thành công";
        return $data;
        // return $data;
    }
}