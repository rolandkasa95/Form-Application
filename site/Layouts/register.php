<html>
<body>
<div id="content">
    <?php echo $this->form->getStartTag()?>
    <?php foreach($this->form->getFields() as $field) : ?>
        <?php if(method_exists($field, 'getLabelTag')) : ?>
            <?php echo $field->getLabelTag();?>
        <?php endif ?>
        <?php echo $field->getInput() . '</br>'?>
    <?php endforeach ?>
    <?php echo $this->form->getEndTag()?>
    <a href="../index.php" style="border-style: double ;padding: 8px 10px 10px 8px; border-radius: 20px;">Back to Login</a>
</div>
</body>
</html>