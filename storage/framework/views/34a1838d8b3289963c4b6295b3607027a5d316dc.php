<table>
    <thead>
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>NISN</th>
        <th>Status</th>
        <th>No Peserta</th>
        
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $agen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($item->name); ?></td>
            <td><?php echo e($item->email); ?></td>
            <td><?php echo e($item->nisn); ?></td>
            <td><?php echo e($lulus); ?></td>
            <td><?php echo e($item->nomor_peserta); ?></td>
            
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH C:\laragon\www\ppdb\resources\views/agen/allsiswabayar.blade.php ENDPATH**/ ?>