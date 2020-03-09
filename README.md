# pimcore-object-fields-permissions

[![Continuous Integration](https://github.com/divanteltd/pimcore-object-fields-permissions/workflows/Continuous%20Integration/badge.svg)](https://github.com/divanteltd/pimcore-object-fields-permissions/actions)

[![Code Coverage](https://codecov.io/gh/divanteltd/pimcore-object-fields-permissions/branch/master/graph/badge.svg)](https://codecov.io/gh/divanteltd/pimcore-object-fields-permissions)
[![Type Coverage](https://shepherd.dev/github/divanteltd/pimcore-object-fields-permissions/coverage.svg)](https://shepherd.dev/github/divanteltd/pimcore-object-fields-permissions)

[![Latest Stable Version](https://poser.pugx.org/divante-ltd/pimcore-object-fields-permissions/v/stable)](https://packagist.org/packages/divante-ltd/pimcore-object-fields-permissions)[![Total Downloads](https://poser.pugx.org/divanteltd/pimcore-object-fields-permissions/downloads)](https://packagist.org/packages/divanteltd/pimcore-object-fields-permissions)
[![Total Downloads](https://poser.pugx.org/divante-ltd/pimcore-object-fields-permissions/downloads)](https://packagist.org/packages/divante-ltd/pimcore-object-fields-permissions)

## Install

```
composer require divante-ltd/pimcore-object-fields-permissions
```

Enable the Bundle:
```
bin/console pimcore:bundle:enable ObjectFieldsPermissionsBundle

```
## Usage

```yaml
object_fields_permissions:
    objects:
        Product:
            -
                roles: ['ROLE_EDITOR', 'ROLE_TRANSLATOR']
                conditions:
                    -
                        status: 'edit'
                properties:
                    -
                        price: ['locked']
                        description: ['mandatory']
```
In above example for user with role `EDITOR` or `TRANSLATOR` when object with class `Product` will have value `edit` for field `status` field `price` will be locked and `description` will be `mandatory`

## Contributing

Please have a look at [`CONTRIBUTING.md`](.github/CONTRIBUTING.md).

## Code of Conduct

Please have a look at [`CODE_OF_CONDUCT.md`](.github/CODE_OF_CONDUCT.md).

## License

This package is licensed using the GNU General Public License v3.0.

Please have a look at [`LICENSE.md`](LICENSE.md).
