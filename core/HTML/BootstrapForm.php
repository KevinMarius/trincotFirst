<?php
namespace Core\Html;

use Core\Html\Form;

class BootstrapForm extends Form {
        
    /**
     * input
     *
     * @param  mixed $name
     * @param  mixed $label
     * @param  mixed $options
     * @return string
     */
    public function input($name, $label, $options = [], $id = null, $placeholder=null)
    {
        $type = isset($options['type']) ? $options['type'] : 'text';
        $label = '<label>'. ucfirst($label). '</label>';
        if ($type === 'textarea') {
            $input = '<textarea class="form-control" placeholder="'. $placeholder .'" name='. $name . ' id="tinymce">'. $this->getValue($name) .'</textarea>';
        }else if($type === 'file') {
            return '<input type="'. $type .'" name="'.$name.'">';
        }else {
            $input = '<input class="form-control" placeholder="'. $placeholder .'" type="'. $type .'" name="'. $name . '" value="'. $this->getValue($name) .'">';
        }
        return $this->surround($label . $input);
    }
        
    /**
     * surround
     *
     * @param  mixed $html
     * code html a retourner
     * @return string
     */
    public function surround($html)
    {
        return "<div class='form-group'>{$html}</div>";
    }
    
    /**
     * submit
     * code html a retourner
     *
     * @return string
     */
    public function submit($label, $attributes)
    {
        return $this->surround('<button class="'. $attributes .'" type="submit">'. $label .'</button>');
    }

    public function select($name, $label, $options) {
        $label = '<label>'. ucfirst($label). '</label>';
        $input = '<select class="form-control" name="'. $name . '">';
        foreach($options as $key => $value) {
            $attributes = '';
            if($key == $this->getValue($name)) {
                $attributes = 'selected';
            }
            $input .= "<option value='$key'$attributes>$value</option>";
        }
        $input .= '</select>';

        return $this->surround($label . $input);
        
    }

}