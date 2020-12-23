<?php if(1==1): ?>

    <p>Use-with-html: condition: if(1==1)</p>
    
<?php else: ?>
        
    <p>Use-with-html: condition: else</p>

<?php endif; ?>


<p <?php if(1==1) { ?> style="color:green" <?php }?> > Use-with-html: inline condition</p>