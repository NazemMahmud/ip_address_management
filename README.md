# About
**IP Address Management Solution**

# Table of Contents

| No. | Title                         |
|-----|-------------------------------|
| 1   | [Todos](#task-implemented)    |
| 2   | [Installation](#installation) |

# Todos
1. Authentication system, which will generate an authenticated token, with all subsequent steps requiring this authenticated token.
2. Add/Modify IP address with a small label/comment to it.
    1. Only authenticated user can do this.
    2. IP address must be validated before creating new entry
    3. IP address can't be modified, only the label of it.
    4. No delete action needed
3. An audit trail should be maintained for every login, addition or change
    1. Audit log can't be modified from codebase
