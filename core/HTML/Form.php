<?php
namespace Core\Html;

class Form
{
    protected $data;
    protected $surround = 'p';

    public function __construct($data)
    {
        $this->data = $data;
    }

    protected function getValue($index)
    {
        if(is_object($this->data)) {
            return $this->data->$index;
        }
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }
    /**
     * input
     *
     * @param  mixed $name
     * @param  mixed $label
     * @param  mixed $options
     * @return string
     */
    public function input($name, $label, $options = [])
    {
        $type = isset($options['type']) ? $options['type'] : 'text';
        return $this->surround(
            '<input type="'. $type .'" name="'. $name . '" value="'. $this->getValue($name) .'">'
        );
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
        return $this->surround('<button type="submit">Envoyer</button>');
    }

}
    