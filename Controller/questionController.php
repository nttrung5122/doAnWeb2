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
        $idQuestion=QuestionModel::createQuestion($noidung,$idGroup);
        QuestionModel::createAnswer($idQuestion,'A',$cauA,'A'==$dapAn);
        QuestionModel::createAnswer($idQuestion,'B',$cauB,'B'==$dapAn);
        QuestionModel::createAnswer($idQuestion,'C',$cauC,'C'==$dapAn);
        QuestionModel::createAnswer($idQuestion,'D',$cauD,'D'==$dapAn);
        $data['status']="success";
        $data['notice']="Tạo câu hỏi thành công";
        return $data;
        // return $data;
    }
}