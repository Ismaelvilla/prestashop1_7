<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerP40pea3\appDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerP40pea3/appDevDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerP40pea3.legacy');

    return;
}

if (!\class_exists(appDevDebugProjectContainer::class, false)) {
    \class_alias(\ContainerP40pea3\appDevDebugProjectContainer::class, appDevDebugProjectContainer::class, false);
}

return new \ContainerP40pea3\appDevDebugProjectContainer([
    'container.build_hash' => 'P40pea3',
    'container.build_id' => '8ce26fc5',
    'container.build_time' => 1594293109,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerP40pea3');
