(**
 * Copyright (c) 2018, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE fn in the "hack" directory of this source tree.
 *
 *)

val set:
  ServerEnv.env -> ServerEnv.prechecked_files_status -> ServerEnv.env

val update_after_recheck:
  ServerEnv.env ->
  'a Relative_path.Map.t ->
  ServerEnv.env

val update_after_local_changes:
  ServerEnv.env ->
  Typing_deps.DepSet.t ->
  ServerEnv.env
