<html>
<body>
<div>
    <?php echo $this->form->getStartTag();
    foreach ($this->form->getFields() as $field){
        if (method_exists($field,'getLabelTag')){
            echo $field->getLabelTag();
        }
        echo $field->getInput() . '<br />';
    }
    echo $this->form->getEndTag();
    ?>
</div>
</body>
</html>