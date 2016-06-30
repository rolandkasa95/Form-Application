<html>
<body>
<div id="content">
    <h1>Welcome, please login</h1>
    <?php echo $this->form->getStartTag()?>
    <?php foreach($this->form->getFields() as $field) : ?>
        <?php if(method_exists($field, 'getLabelTag')) : ?>
            <?php echo $field->getLabelTag();?>
        <?php endif ?>
        <?php echo $field->getInput() . '</br>'?>
    <?php endforeach ?>
    <?php echo $this->form->getEndTag()?>
    <br />
    <a href="index.php?action=register">Register</a>
</div>
</body>
</html>