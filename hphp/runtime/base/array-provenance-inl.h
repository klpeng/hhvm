/*
   +----------------------------------------------------------------------+
   | HipHop for PHP                                                       |
   +----------------------------------------------------------------------+
   | Copyright (c) 2010-present Facebook, Inc. (http://www.facebook.com)  |
   +----------------------------------------------------------------------+
   | This source file is subject to version 3.01 of the PHP license,      |
   | that is bundled with this package in the file LICENSE, and is        |
   | available through the world-wide-web at the following url:           |
   | http://www.php.net/license/3_01.txt                                  |
   | If you did not receive a copy of the PHP license and are unable to   |
   | obtain it through the world-wide-web, please send a note to          |
   | license@php.net so we can mail you a copy immediately.               |
   +----------------------------------------------------------------------+
*/

#ifndef incl_HPHP_ARRAY_PROVENANCE_INL_H_
#error "array-provenance-inl.h should only be included by array-provenance.h"
#endif

namespace HPHP { namespace arrprov {

///////////////////////////////////////////////////////////////////////////////

namespace unchecked {

inline bool tvWantsTag(TypedValue tv) {
  return isVecType(type(tv)) || isDictType(type(tv));
}

inline void copyTag(const ArrayData* src, ArrayData* dest) {
  if (auto const tag = unchecked::getTag(src)) {
    unchecked::setTag(dest, *tag);
  } else {
    unchecked::setTag(dest, tagFromProgramCounter());
  }
}

}

///////////////////////////////////////////////////////////////////////////////

inline namespace checked {

inline folly::Optional<Tag> getTag(const ArrayData* ad) {
  if (!RuntimeOption::EvalLogArrayProvenance) return {};
  return unchecked::getTag(ad);
}
inline void setTag(ArrayData* ad, const Tag& tag) {
  if (!RuntimeOption::EvalLogArrayProvenance) return;
  unchecked::setTag(ad, tag);
}
inline void copyTag(const ArrayData* src, ArrayData* dest) {
  if (!RuntimeOption::EvalLogArrayProvenance) return;
  unchecked::copyTag(src, dest);
}
inline void clearTag(ArrayData* ad) {
  if (!RuntimeOption::EvalLogArrayProvenance) return;
  unchecked::clearTag(ad);
}
inline void copyTagStatic(const ArrayData* src, ArrayData* dest) {
  if (!RuntimeOption::EvalLogArrayProvenance) return;
  if (auto const tag = unchecked::getTag(src)) {
    unchecked::setTag(dest, *tag);
  }
}

} // inline namespace checked

///////////////////////////////////////////////////////////////////////////////

}}
