<?php $__env->startSection('content'); ?>
	<h2>게시판</h2>
	<table>
		<tr>
			<td>글번호</td><td>글제목</td><td>글쓴이</td>
		</tr>
		<?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($item->idx); ?></td>
				<td>
					<a href="/board/view/<?php echo e($item->id); ?>">
						<?php echo e($item->title); ?>

					</a>
				</td>
				<td><?php echo e($item->writer); ?></td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>
	<a href="/board/write">글쓰기</a>
	<br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>