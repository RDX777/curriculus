"use client";
import { motion } from "framer-motion";
import { useUserSession } from "@/contexts/userSession";
import { Avatar, AvatarFallback } from "@/components/ui/avatar";

export const AvatarIcon = () => {
  const { userSession, getInitials } = useUserSession();
  return (
    <motion.div
      animate={{
        scale: [1, 2, 2, 1, 1],
        rotate: [0, 0, 270, 270, 0],
        borderRadius: ["20%", "20%", "50%", "50%", "20%"],
      }}
    >
      <Avatar className="w-10 h-10 rounded-full mx-2 text-cyan-600 text-opacity-95 bg-transparent border-2 border-cyan-600 transition-icons">
        {/* <AvatarImage src="https://github.com/shadcn.png" /> */}
        <AvatarFallback>{getInitials(userSession?.name)}</AvatarFallback>
      </Avatar>
    </motion.div>
  );
};
