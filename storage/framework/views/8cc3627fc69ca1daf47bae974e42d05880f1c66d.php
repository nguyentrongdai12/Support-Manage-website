<input <?php if($row->required == 1): ?> required <?php endif; ?> type="time"  data-name="<?php echo e($row->getTranslatedAttribute('display_name')); ?>"  class="form-control" name="<?php echo e($row->field); ?>"
       placeholder="<?php echo e(old($row->field, $options->placeholder ?? $row->getTranslatedAttribute('display_name'))); ?>"
       <?php echo isBreadSlugAutoGenerator($options); ?>

       value="<?php echo e(old($row->field, $dataTypeContent->{$row->field} ?? $options->default ?? '')); ?>">
<?php /**PATH D:\XAMPP\htdocs\Support Manage\vendor\tcg\voyager\src/../resources/views/formfields/time.blade.php ENDPATH**/ ?>