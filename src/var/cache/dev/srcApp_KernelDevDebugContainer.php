<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerNmp3DFZ\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerNmp3DFZ/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerNmp3DFZ.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerNmp3DFZ\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerNmp3DFZ\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'Nmp3DFZ',
    'container.build_id' => '2dbca530',
    'container.build_time' => 1584542084,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerNmp3DFZ');
