<html>
<body>
<div>
    <h1>Welcome to the Login faze</h1>
    <?php echo $this->form->getStartTag();
        foreach ($this->form->getFields() as $field){
            if (method_exists($field,'getLabelTag')){
                echo $field->getLabelTag();
            }
            echo $field->getInput() . '<br />';
        }
        echo $this->form->getEndTag();
    ?>
    <br />
    <a href="index.php?action=register">Register</a>
</div>
</body>
</html>