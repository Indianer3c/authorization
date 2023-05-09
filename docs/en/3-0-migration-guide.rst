3.0 Migration Guide
###################

Authorization 3.0 contains new features and a few breaking changes.

Breaking Changes
================

The following interfaces now have appropriate parameter and return types added:

- ``AuthorizationServiceInterface``
- ``IdentityInterface``
- ``BeforePolicyInterface``
- ``RequestPolicyInterface.php``
- ``ResolverInterface``

Multiple optional arguments for ``applyScope``, ``can`` and ``canResult``
-------------------------------------------------------------------------

The following interface methods have been adjusted to pass on multiple optional arguments.
- ``IdentityInterface::applyScope``
- ``AuthorizationServiceInterface::applyScope``
- ``AuthorizationServiceInterface::can``
- ``AuthorizationServiceInterface::canResult``

Removed methods
---------------

- ``AuthorizationService::resultTypeCheck`` - has been replaced with an ``assert()`` call

