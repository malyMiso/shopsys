# [Upgrade from v7.3.1 to v7.3.2-dev](https://github.com/shopsys/shopsys/compare/v7.3.1...7.3)

This guide contains instructions to upgrade from version v7.3.1 to v7.3.2-dev.

**Before you start, don't forget to take a look at [general instructions](/UPGRADE.md) about upgrading.**
There you can find links to upgrade notes for other versions too.

## [shopsys/framework]

### Configuration
- update your `app/config/packages/doctrine.yml` ([#1273](https://github.com/shopsys/shopsys/pull/1273))
    ```diff
       ShopsysShopBundle:
           type: annotation
           dir: '%shopsys.root_dir%/src/Shopsys/ShopBundle/Model'
           alias: ShopsysShopBundle
           prefix: Shopsys\ShopBundle\Model
           is_bundle: false
    +  ShopsysShopBundleComponent:
    +      type: annotation
    +      dir: '%shopsys.root_dir%/src/Shopsys/ShopBundle/Component'
    +      alias: ShopsysShopBundleComponent
    +      prefix: Shopsys\ShopBundle\Component
    +      is_bundle: false
    ```

[shopsys/framework]: https://github.com/shopsys/framework