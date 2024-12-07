import { motion } from "framer-motion";
export const AppNameMotionIcon = () => {
  const appName = process.env.NEXT_PUBLIC_APP_NAME;
  return (
    <motion.div
      className="flex ml-1"
      initial={{ opacity: 0, x: -100, y: -100 }}
      animate={{ opacity: 1, x: 0, y: 0 }}
      transition={{
        type: "spring",
        damping: 10,
        stiffness: 100,
        delay: Math.random(),
      }}
    >
      <label className="justify-start text-2xl">{appName}</label>
      <label className="text-sm">&#174;</label>
    </motion.div>
  );
};
