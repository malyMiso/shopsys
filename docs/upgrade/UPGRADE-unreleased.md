# [Upgrade from v7.2.0 to Unreleased](https://github.com/shopsys/shopsys/compare/v7.2.0...HEAD)

This guide contains instructions to upgrade from version v7.2.0 to Unreleased.

**Before you start, don't forget to take a look at [general instructions](/UPGRADE.md) about upgrading.**
There you can find links to upgrade notes for other versions too.

## [shopsys/framework]

### Application
- call `Form::isSubmitted()` before `Form::isValid()` ([#1041](https://github.com/shopsys/shopsys/pull/1041))
    - search for `$form->isValid() && $form->isSubmitted()` and fix the order of calls (in `shopsys/project-base` the wrong order could have been found in `src/Shopsys/ShopBundle/Controller/Front/PersonalDataController.php`):
        ```diff
        - if ($form->isValid() && $form->isSubmitted()) {
        + if ($form->isSubmitted() && $form->isValid()) {
        ```
- fix the typo in Twig template `@ShopsysShop/Front/Content/Category/panel.html.twig` ([#1043](https://github.com/shopsys/shopsys/pull/1043))
    - `categoriyWithLazyLoadedVisibleChildren` ⟶ `categoryWithLazyLoadedVisibleChildren`
- follow instructions in [the separate article](upgrade-instructions-for-read-model-for-product-lists.md) to introduce read model for frontend product lists into your project ([#1018](https://github.com/shopsys/shopsys/pull/1018))
    - we recommend to read [Introduction to Read Model](/docs/model/introduction-to-read-model.md) article
- create an empty file `app/Resources/.gitkeep` to prepare a folder for [your overwritten templates](/docs/cookbook/modifying-a-template-in-administration.md) ([#1073](https://github.com/shopsys/shopsys/pull/1073))

### Tools
- use the `build.xml` [Phing](/docs/introduction/console-commands-for-application-management-phing-targets.md) configuration from the `shopsys/framework` package ([#1068](https://github.com/shopsys/shopsys/pull/1068))
    - assuming your `build.xml` and `build-dev.xml` are the same as in `shopsys/project-base` in `v7.2.0`, just remove `build-dev.xml` and replace `build.xml` with this file:
    ```xml
    <?xml version="1.0" encoding="UTF-8"?>
    <project name="Shopsys Framework" default="list">

        <property file="${project.basedir}/build/build.local.properties"/>

        <property name="path.root" value="${project.basedir}"/>
        <property name="path.vendor" value="${path.root}/vendor"/>
        <property name="path.framework" value="${path.vendor}/shopsys/framework"/>

        <import file="${path.framework}/build.xml"/>

        <property name="is-multidomain" value="true"/>
        <property name="phpstan.level" value="0"/>

    </project>
    ```
    - some phing targets marked as deprecated or were renamed, stop using them and use the new ones (the original targets will still work, but a warning message will be displayed):
        - `dump-translations-project-base` was deprecated, use `dump-translations` instead
- we recommend upgrading PHPStan to level 4 [#1040](https://github.com/shopsys/shopsys/pull/1040)
    - you'll find detailed instructions in separate article [Upgrade Instructions for Upgrading PHPStan to Level 4](/docs/upgrade/phpstan-level-4.md)

[shopsys/framework]: https://github.com/shopsys/framework
