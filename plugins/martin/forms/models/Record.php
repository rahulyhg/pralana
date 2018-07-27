<?php

    namespace Martin\Forms\Models;

    use Model;

    use Cms\Classes\ComponentBase;
    use Illuminate\Http\Request;

    class Record extends Model {

        use \October\Rain\Database\Traits\SoftDelete;

        public $table = 'martin_forms_records';

        protected $dates = ['deleted_at'];

        public $attachMany = [
            'files' => ['System\Models\File', 'public' => false]
        ];

        public function getFormDataArrAttribute() {
            return (array) json_decode($this->form_data);
        }

        public function filterGroups() {
            return Record::orderBy('group')->groupBy('group')->lists('group', 'group');
        }

        public function getGroupsOptions() {
            return $this->filterGroups();
        }

        public function saveFormApp(){
            $post = file_get_contents("php://input");
            $record = new Record;
            $record->ip        = '(Not stored)';
            $record->form_data = $post;
            $record->group = 'Aplicativo';
            $record->save();

            return json_encode(array('msg'=>'Mensagem enviada com sucesso, aguarde nosso contato.','record'=>$record));
        }

    }

?>